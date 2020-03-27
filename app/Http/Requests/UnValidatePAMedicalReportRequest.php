<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnValidatePAMedicalReportRequest extends FormRequest
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
            'sampleId' => 'exists:pathological_anatomy_laboratory_samples,id'
        ];
    }

    public function messages()
    {
        $messages = array(
            'sampleId.exists' => 'Ha ocurrido un error: La muestra enviada no es válida.'
        );

        return $messages;
    }
}
