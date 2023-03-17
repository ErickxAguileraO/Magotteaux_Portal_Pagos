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
use App\Models\Proveedor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

            $logCarga->log_fila = $import->getRowCount();
            $logCarga->save();

            $identificadores = $import->getIndentificadores();

            $proveedores = Proveedor::with('correos')->whereIn('pro_identificacion', $identificadores)->get();

            $correoUno = [];
            $correoDos = [];

            foreach ($proveedores as $proveedor) {
                $correoUno[] = $proveedor->correos[0]->cor_email;
                $correoDos[] = $proveedor->correos[1]->cor_email ?? null;
            }

            $correoDos = array_filter($correoDos);

            Mail::to($correoUno)->cc($correoDos)->send((new NotificacionPago($logCarga)));

            DB::commit();
            return redirect()->route('carga.index')->with(['message' => 'Excel cargado correctamente', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info('mensaje error', ['error' => $th]);
            dd($th);
            return redirect()->back()->with(['message' => '"No se pudo realizar la carga de los datos por que el Archivo presenta problemas de Formato', 'type' => 'error']);
        }

    }

    public function downloadExcel()
    {
        try {
        $logCarga = LogCarga::withCount('pagos')->orderBy('log_id', 'desc')->get();

        return Excel::download(new LogCargaMasivaExport($logCarga), 'LogCargaMasiva.xlsx');
        } catch (\Throwable $th) {

            return redirect()->back()->with(['message' => 'Ocurrio un error al intentar descargar el excel', 'type' => 'error']);
        }
    }

}
