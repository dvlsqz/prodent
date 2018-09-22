<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorialTratamientosFormRequest extends FormRequest
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
          'fecha_inicio',
          'fecha_culminacion',
          'abono' => 'required|string|max:45',
          'estado' => 'required|string|max:45',
          'detalles',
          'paciente_id',
          'tratamiento_id',
        ];
    }
}
