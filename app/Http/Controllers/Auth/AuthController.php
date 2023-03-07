<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('sistema.auth.login');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $isValid = Auth::attempt([
            'usu_email' => $request->post('email'),
            'password' => $request->post('password')
        ]);

        if (!$isValid) return redirect()->back()->with(['message' => 'Correo o contraseña incorrecto', 'type' => 'error'])->withInput();

        if (auth()->user()->hasRole('Administrador')) return redirect()->route('usuario.index');
        if (auth()->user()->hasRole('Tesorero')) return redirect()->route('carga.index');
        if (auth()->user()->hasRole(['Finanza', 'Gerencia', 'Proveedor'])) return redirect()->route('pago.index');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('web.login');
    }
}
