<?php

namespace App\Http\Controllers\Sistema;

use App\Exports\LogCargaMasivaExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogCarga\CreateLogCargaRequest;
use App\Http\Resources\CargaMasivaResource;
use App\Imports\CargaMasivaImport;
use App\Models\LogCarga;
use App\Models\Pago;
use App\Models\Planta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            $logCarga = LogCarga::create([
                'log_archivo' => $request->file('excel')->getClientOriginalName(),
                'log_usuario_id' => Auth::id(),
            ]);
            Excel::import(new CargaMasivaImport($logCarga->log_id, $request->planta), request()->file('excel'));

            return redirect()->route('carga.index')->with(['message' => 'Excel cargado correctamente', 'type' => 'success']);
        } catch (\Throwable $th) {
            $borrarLog = LogCarga::findOrFail($logCarga->log_id);
            $borrarLog->delete();
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
}
