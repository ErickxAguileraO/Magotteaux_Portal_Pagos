<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRequest extends FormRequest
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
            'razon_social' => 'required|max:255',
            'pro_identificacion' => 'max:255|required',
            'pais' => 'required',
            'email_uno' => 'required|email',
            'email_dos' => 'max:255|different:email_uno',
            'pro_estado' => 'required',
            'telefono_contacto' => 'required|numeric'
        ];
    }
}
