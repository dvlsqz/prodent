<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraFormRequest extends FormRequest
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
          'num_lote',
          'fecha',
          'total',
          'detalles'  => 'required|string|max:255',
          'doctor_id',
          'forma_pago_id',
          'cantidad',
          'precio',
          'subtotal',
          'medicamento_id',
          'compra_id',
          'proveedor_id'
        ];
    }
}
