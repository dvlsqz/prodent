<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendedoresFormRequest extends FormRequest
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
        'nombre'=> 'required|string|max:255',
        'apellido'=> 'required|string|max:255',
        'correo'=> 'required|string|max:255',
        'direccion'=> 'required|string|max:255',
        'telefono'=> 'required|string|max:15',
        'proveedor_id'

      ];
    }
}
