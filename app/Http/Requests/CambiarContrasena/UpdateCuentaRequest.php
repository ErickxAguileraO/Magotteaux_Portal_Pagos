<?php

namespace App\Http\Requests\CambiarContrasena;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCuentaRequest extends FormRequest
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
            'password_actual' => 'required|max:255|min:8',
            'password_nueva' => 'required|max:255|min:8',
            'password_nueva_confirmar' => 'required|same:password_nueva'
        ];
    }
}
