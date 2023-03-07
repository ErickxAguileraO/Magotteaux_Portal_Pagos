<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('sistema.usuario.index');
    }

    // public function list()
    // {
    //     $usuarios = User::with('planta')->ignoreFirstUser()->get();

    //     return UsuarioResource::collection($usuarios);
    // }
}
