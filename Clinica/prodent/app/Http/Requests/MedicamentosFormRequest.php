<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentosFormRequest extends FormRequest
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
        'codigo' => 'required|string|max:255',
        'nombre'=> 'required|string|max:100',
        'fecha_cad',
        'stock',
        'sotck_minimo',
        'presentacion'=> 'required|string|max:255',
        'precio_costo',
        'precio_venta',
        'estado',
        'proveedor_id'
      ];
    }
}
