<?php

namespace App\Http\Controllers\Sistema;

use App\Exports\LogCargaMasivaExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogCarga\CreateLogCargaRequest;
use App\Http\Resources\CargaMasivaResource;
use App\Imports\CargaMasivaImport;
use App\Mail\Notificacion\NotificacionPago;
use App\Models\Correo;
use App\Models\LogCarga;
use App\Models\Pago;
use App\Models\Planta;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class CargaMasivaController extends Controller
{
    public function index()
    {
        $plantas = Planta::all();
        return view('sistema.cargas.index', compact('plantas'));
    }

    public function list()
    {
        $cargaMasiva = LogCarga::withCount('pagos')->get();
        return CargaMasivaResource::collection($cargaMasiva);
    }

    public function importar(CreateLogCargaRequest $request)
    {
        try {
            DB::beginTransaction();

            $logCarga = LogCarga::create([
                'log_archivo' => $request->file('excel')->getClientOriginalName(),
                'log_usuario_id' => Auth::id(),
            ]);
            $import = new CargaMasivaImport($logCarga->log_id, $request->planta);
            Excel::import($import, request()->file('excel'));
            // dd($import->getRowCount());
            $filaCarga = LogCarga::findOrFail($logCarga->log_id);
            $filaCarga->log_fila = $import->getRowCount();
            $filaCarga->save();

            DB::commit();
            return redirect()->route('carga.index')->with(['message' => 'Excel cargado correctamente', 'type' => 'success']);
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollBack();
            return redirect()->back()->with(['message' => 'Ocurrio un error al intentar cargar el excel', 'type' => 'error']);
        }

    }

    public function downloadExcel()
    {
        // try {
        $logCarga = LogCarga::withCount('pagos')->orderBy('log_id', 'desc')->get();

        return Excel::download(new LogCargaMasivaExport($logCarga), 'LogCargaMasiva.xlsx');
        // } catch (\Throwable $th) {

        //     return redirect()->back()->with(['message' => 'Ocurrio un error al intentar descargar el excel', 'type' => 'error']);
        // }
    }

    public function sendEmail()
    {
        $horaActual = Carbon::now();
        $correo = Correo::all();
        $logCarga = LogCarga::where('created_at')->get();
        $pago = Pago::all();
        $usuarioProveedor = User::role('Proveedor')->get();
        $correoUno = [];
        $correoDos = [];

        foreach ($correo as $emailUno) {
            if ($emailUno['usu_destino_id'] == $pago->pag_identificacion) {
                $correoUno[] = $emailUno['usu_email'];
            }
        }

        foreach ($correo as $emailDos) {
            if ($emailDos['usu_planta_id'] == $pago->pag_identificacion) {
                $correoDos[] = $emailDos['usu_email'];
            }
        }
        Mail::to($correoUno)->cc($correoDos)->send((new NotificacionPago($logCarga)));
        return redirect()->route('carga.index')->with(['message' => 'Se envió el correo exitosamente', 'type' => 'success']);
    }
}
