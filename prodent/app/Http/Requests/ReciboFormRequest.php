<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReciboFormRequest extends FormRequest
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
          'serie'  => 'required|string|max:15',
          'fecha',
          'descuento',
          'total',
          'detalles'  => 'required|string|max:255',
          'estado',
          'paciente_id',
          'forma_pago_id'
        ];
    }
}
