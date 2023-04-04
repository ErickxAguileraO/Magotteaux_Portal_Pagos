<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'celular' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email:filter', Rule::unique('usuarios', 'usu_email')->whereNull('deleted_at')],
            'email_dos' => 'max:255|different:email',
            'contrasena' => ['required', 'max:255', 'min:8'],
            'identificacion' => ['required', 'max:255'],
            'tipo' => ['required', 'in:1,2,3,4,5'],
            'proveedor' => [
                'nullable',
                'required_if:tipo,3',
                Rule::exists('proveedores', 'pro_id')->whereNull('deleted_at')
            ],
            'planta' => [
                'nullable',
                'required_if:tipo,1',
                Rule::exists('plantas', 'pla_id')->whereNull('deleted_at')
            ],
            'estado' => ['required', 'boolean'],
        ];
    }

    public function messages()
    {
        return [
            'proveedor.required_if' => 'El campo proveedor es obligatorio cuando tipo usuario es proveedor.',
            'planta.required_if' => 'El campo planta es obligatorio cuando tipo usuario es finanzas.',
        ];
    }
}
