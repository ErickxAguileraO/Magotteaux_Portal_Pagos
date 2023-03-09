<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Controllers\Controller;
use App\Http\Requests\Proveedor\CreateProveedorRequest;
use App\Http\Requests\Proveedor\UpdateProveedorRequest;
use App\Models\Correo;
use App\Models\Pais;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return view('sistema.proveedor.index');
    }

    public function create()
    {
        $paises = Pais::all();
        return view('sistema.proveedor.crear', compact('paises'));
    }

    public function store(CreateProveedorRequest $request)
    {
        try {
            if ($request->email_dos == '') {

                $proveedor = Proveedor::create([
                    'pro_razon_social' => $request->razon_social,
                    'pro_identificacion' => $request->pro_identificacion,
                    'pro_telefono' => $request->telefono_contacto,
                    'pro_estado' => $request->pro_estado,
                    'pro_pais_id' => $request->pais
                ]);

                $correo = Correo::create([
                    'cor_email' => $request->email_uno,
                    'cor_proveedor_id' => $proveedor->pro_id

                ]);
                return redirect()->route('proveedor.index')->with(['message' => 'Se creo un nuevo proveedor', 'type' => 'success']);
            } else {

                $proveedor = Proveedor::create([
                    'pro_razon_social' => $request->razon_social,
                    'pro_identificacion' => $request->pro_identificacion,
                    'pro_telefono' => $request->telefono_contacto,
                    'pro_estado' => $request->pro_estado,
                    'pro_pais_id' => $request->pais
                ]);

                $correo = Correo::create([
                    'cor_email' => $request->email_uno,
                    'cor_proveedor_id' => $proveedor->pro_id

                ]);

                $correo = Correo::create([
                    'cor_email' => $request->email_dos,
                    'cor_proveedor_id' => $proveedor->pro_id

                ]);
                return redirect()->route('proveedor.index')->with(['message' => 'Se creo un nuevo proveedor', 'type' => 'success']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['message' => 'Ocurrio un error al intentar crea un proveedor', 'type' => 'error']);
        }
    }

    public function edit($id)
    {
        $proveedores = Proveedor::findOrFail($id);
        $paises = Pais::all();
        $correos = Correo::where('cor_proveedor_id', $id)->get();
        return view('sistema.proveedor.editar', compact('proveedores', 'paises', 'correos'));
    }

    public function update(UpdateProveedorRequest $request, int $id)
    {

        // try {
        //  $correo = Correo::where('cor_proveedor_id',$id)->first();
        //  dd($correo);
        if ($request->email_dos == '') {

            $proveedor = Proveedor::findOrFail($id);
            $proveedor->pro_razon_social = $request->razon_social;
            $proveedor->pro_identificacion = $request->pro_identificacion;
            $proveedor->pro_telefono = $request->telefono_contacto;
            $proveedor->pro_estado = $request->pro_estado;
            $proveedor->pro_pais_id = $request->pais;
            $proveedor->save();

            $correo = Correo::where('cor_proveedor_id', $id)->first();
            $correo->update([
                'cor_email' => $request->email_uno,

            ]);
            $correos = Correo::where('cor_proveedor_id', $id)->get();
            if ($request->email_dos=='' && $correos->count()==2) {
                $correos[1]->delete();
            }
            return redirect()->route('proveedor.index')->with(['message' => 'Se edito proveedor', 'type' => 'success']);
        } else {

            $proveedor = Proveedor::findOrFail($id);
            $proveedor->pro_razon_social = $request->razon_social;
            $proveedor->pro_identificacion = $request->pro_identificacion;
            $proveedor->pro_telefono = $request->telefono_contacto;
            $proveedor->pro_estado = $request->pro_estado;
            $proveedor->pro_pais_id = $request->pais;
            $proveedor->save();


            $correo = Correo::where('cor_proveedor_id', $id)->first();
            $correo->update([
                'cor_email' => $request->email_uno,

            ]);
            $correos = Correo::where('cor_proveedor_id', $id)->get();

            if ($correos->count()==1) {
                $proveedor = Proveedor::findOrFail($id);
                $correo = Correo::create([
                    'cor_email' => $request->email_dos,
                    'cor_proveedor_id' => $proveedor->pro_id
                ]);
            }else {
                $correos[1]->update([
                    'cor_email' => $request->email_dos,
                ]);
            }


            return redirect()->route('proveedor.index')->with(['message' => 'Se edito proveedor', 'type' => 'success']);
        }

        // } catch (\Throwable $th) {
        //     return redirect()->back()->with(['message' => 'Ocurrio un error al intentar editar proveedor', 'type' => 'error']);
        // }
    }
}
