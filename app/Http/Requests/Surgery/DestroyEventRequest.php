<?php

namespace App\Http\Requests\Surgery;

use Illuminate\Foundation\Http\FormRequest;

class DestroyEventRequest extends FormRequest
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
        $rules = [];

        $rules['event_id'] = 'required|exists:surgery_events,id';
        if(!\Auth::user()->hasPermissionTo('surgery.delete')) {
            $rules['permission'] = 'required';
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [];

        $messages['id.required'] = 'Ocurrio un error de sistema. Por favor contáctese con el depto. de Informática. (Error: Falta SURGERY_ID).';
        $messages['id.exists'] = 'Ocurrio un error de sistema. Por favor contáctese con el depto. de Informática. (Error: No existe el evento).';
        $messages['permission.required'] = 'Usted no tiene permisos para eliminar el turno de la cirugía.';

        return $messages;
    }
}
