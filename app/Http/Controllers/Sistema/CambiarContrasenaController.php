<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Http\Requests\CambiarContrasena\UpdateCuentaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CambiarContrasenaController extends Controller
{
    public function edit()
    {

        return view('sistema.perfil.index');
    }

    public function update(UpdateCuentaRequest $request)
    {
        $usuario = Auth::user();
        $comprobar = Hash::check($request->password_actual, $usuario->usu_password);
        if (!$comprobar) {
            return redirect()->back()->with(['message' => 'La contraseña actual es incorrecta', 'type' => 'error']);
        }

        $usuario->update(['usu_password' => $request->password_nueva]);


        if ($usuario->roles()->first()->name == 'Administrador') {
            return redirect()->route('usuario.index')->with(['message' => 'Contraseña actualizada correctamente', 'type' => 'success']);
        }

        if ($usuario->roles()->first()->name == 'Tesorero') {
            return redirect()->route('carga.index')->with(['message' => 'Contraseña actualizada correctamente', 'type' => 'success']);
        }

        if ($usuario->roles()->first()->name == 'Proveedor') {
            return redirect()->route('proveedor.index')->with(['message' => 'Contraseña actualizada correctamente', 'type' => 'success']);
        }

        if ($usuario->roles()->first()->name == 'Gerente') {
            return redirect()->route('pago.index')->with(['message' => 'Contraseña actualizada correctamente', 'type' => 'success']);
        }

        if ($usuario->roles()->first()->name == 'Finanza') {
            return redirect()->route('proveedor.index')->with(['message' => 'Contraseña actualizada correctamente', 'type' => 'success']);
        }

    }
}
