<?php

namespace App\Http\Controllers\Sistema;

use App\Exports\PagosExport;
use App\Exports\PagosProveedorExport;
use App\Http\Controllers\Controller;
use App\Http\Resources\PagoProveedorResource;
use App\Http\Resources\PagoResource;
use App\Models\Pago;
use App\Models\Planta;
use Maatwebsite\Excel\Facades\Excel;

class PagoController extends Controller
{
    public function index()
    {
        $plantas = Planta::active()->get();

        return view('sistema.pago.index', compact('plantas'));
    }

    public function list()
    {
        $isProveedor = auth()->user()->hasRole('Proveedor');

        $pagos = Pago::with('tipo')
            ->withFilters($isProveedor)
            ->orderByDesc('pag_id')
            ->get();

        return PagoResource::collection($pagos);
    }

    public function downloadExcel()
    {
        try {
            $isProveedor = auth()->user()->hasRole('Proveedor');

            $pagos = Pago::withFilters($isProveedor)->with('planta:pla_id,pla_nombre')->orderByDesc('pag_id')->get();

            $export = $isProveedor ? new PagosProveedorExport($pagos) : new PagosExport($pagos);

            return Excel::download($export, 'pagos.xlsx');
        } catch (\Throwable $th) {

            return redirect()->back()->with(['message' => 'Ocurrio un error al intentar descargar el excel', 'type' => 'error']);
        }
    }
}
