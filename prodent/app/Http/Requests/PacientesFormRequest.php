<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacientesFormRequest extends FormRequest
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
          'apellido' => 'required|string|max:255',
          'genero' => 'required|string|max:45',
          'fecha_nac',
          'direccion' => 'required|string|max:255',
          'telefono' => 'required|string|max:15',
          'fecha_registro',
        ];
    }
}
