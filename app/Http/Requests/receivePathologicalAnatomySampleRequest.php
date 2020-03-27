<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class receivePathologicalAnatomySampleRequest extends FormRequest
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
        $rules = [
            'sampleId' => 'required|exists:pathological_anatomy_laboratory_samples,id'
        ];

        return $rules;
    }

    public function messages()
    {
        $messages = [
          'sampleId.required' => 'El ID de la muestra es obligatorio.',
          'sampleId.exists' => 'El ID de la muestra es incorrecto.'
        ];

        return $messages;
    }
}
