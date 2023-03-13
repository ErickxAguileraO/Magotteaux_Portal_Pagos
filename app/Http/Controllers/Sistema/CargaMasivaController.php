<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Http\Resources\CargaMasivaResource;
use App\Models\LogCarga;
use Illuminate\Http\Request;

class CargaMasivaController extends Controller
{
    public function index()
    {
        return view('sistema.cargas.index');
    }

    public function list()
    {
        $cargaMasiva = LogCarga::all();
        return CargaMasivaResource::collection($cargaMasiva);
    }
}
