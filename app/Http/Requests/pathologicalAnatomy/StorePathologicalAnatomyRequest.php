<?php

namespace App\Http\Requests\pathologicalAnatomy;

use Illuminate\Foundation\Http\FormRequest;

class StorePathologicalAnatomyRequest extends FormRequest
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
            'patient_id' => 'required',
            'institution_id' => 'required',
            'biopsy_type_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'patient_id.required' => 'Debe seleccionar un paciente',
          'institution_id.required' => 'Debe seleccionar la institución solicitante',
          'biopsy_type_id.required' => 'Debe seleccionar el tipo de estudio requerido (BIOPSIA O PAP).'
        ];
    }
}
