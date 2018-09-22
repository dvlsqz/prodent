<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecetasFormRequest extends FormRequest
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
        'prescripción' => 'required|string|max:255',
        'indicaciones' => 'required|string|max:255',
        'fecha',
        'paciente_id',
        'medicamento_id',
        'doctor_id'
      ];
    }
}
