<?php

namespace App\Http\Controllers\Sistema;

use App\Exports\LogCargaMasivaExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogCarga\CreateLogCargaRequest;
use App\Http\Resources\CargaMasivaResource;
use App\Imports\CargaMasivaImport;
use App\Mail\Notificacion\CambioEstado;
use App\Mail\Notificacion\NotificacionPago;
use App\Models\LogCarga;
use App\Models\Planta;
use App\Models\Proveedor;
use App\Models\User;
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

            $logCarga->log_fila = $import->getRowCount();
            $logCarga->save();

            $identificadores = $import->getIndentificadores();

            //$proveedores = Proveedor::with('correos')->whereIn('pro_identificacion', $identificadores)->get();
            $proveedores = User::whereHas('proveedor', function ($query) use ($identificadores) {
                $query->whereIn('pro_identificacion', $identificadores);
            })
            ->select('usu_email', 'usu_email_dos')
            ->get();
            $cambioEstado = $import->getCambioEstado();
            $proveedorCambioEstado = $import->getProveedor();
            $correoUno = [];
            $correoDos = [];
            foreach ($proveedores as $proveedor) {
                if (!$proveedor->usu_email_dos == '') {
                    $correoUno[] = $proveedor->usu_email;
                    $correoDos[] = $proveedor->usu_email_dos;
                } else {
                    $correoUno[] = $proveedor->usu_email;
                }

            }
            if (!empty($cambioEstado)) {

                $proveedores = User::whereHas('proveedor', function ($query) use ($proveedorCambioEstado) {
                    $query->whereIn('pro_identificacion', $proveedorCambioEstado);
                })
                ->select('usu_email', 'usu_email_dos','usu_proveedor_id')
                ->get();
                $usuarios = User::whereNotNull('usu_proveedor_id')->get();
                //dd('entre al cambio de estado',$cambioEstado,$proveedorCambioEstado,$usuarios);
                $correoUnoEstado = [];
                $correoDosEstado  = [];
                foreach ($proveedores as $proveedor) {
                    if (!$proveedor->usu_email_dos == '') {
                        $correoUnoEstado [] = $proveedor->usu_email;
                        $correoDosEstado [] = $proveedor->usu_email_dos;
                    } else {
                        $correoUnoEstado [] = $proveedor->usu_email;
                    }
                }
                Mail::to($correoUnoEstado )->cc($correoDosEstado )->send((new CambioEstado($logCarga,$cambioEstado,$usuarios,$proveedorCambioEstado)));
            }

            Mail::to($correoUno)->cc($correoDos)->send((new NotificacionPago($logCarga,$cambioEstado)));


            DB::commit();
            return redirect()->route('carga.index')->with(['message' => 'Excel cargado correctamente', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollBack();
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
