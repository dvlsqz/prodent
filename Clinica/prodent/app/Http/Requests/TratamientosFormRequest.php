<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TratamientosFormRequest extends FormRequest
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
          'nombre'=> 'required|string|max:100',
          'tipo'=> 'required|string|max:45',
          'detalle' => 'required|text',
          'precio',
          'receta_id'
        ];
    }
}
