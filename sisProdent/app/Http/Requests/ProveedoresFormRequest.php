<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedoresFormRequest extends FormRequest
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
          'nombre' => 'required|string|max:255',
          'direccion' => 'required|string|max:255',
          'correo' => 'string|max:255',
          'num_cuenta' => 'required|string|max:255',
          'telefono1' => 'required|string|max:15',
          'telefono2' => 'required|string|max:15',
        ];
    }
}
