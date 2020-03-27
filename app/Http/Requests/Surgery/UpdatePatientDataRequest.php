<?php

namespace App\Http\Requests\Surgery;

use App\Models\Surgery\SurgicalProtocol;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize()
    {
        if(\Auth::user()->hasPermissionTo('surgery.updatePatientData')) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'dni' => 'required',
            'name' => 'required',
            'os_id' => 'required'
        ];

        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $this->route()->parameter('surgeryEventId'))->get();

        if(count($surgicalProtocol) > 0) {

            $timeLimit = Carbon::parse($surgicalProtocol[0]->created_at)->addHour();

            $now = Carbon::now();

            if (!$timeLimit->lessThan($now)) {

                $rules['protocol'] = 'required';

                \Flash::error('No puede cambiar los datos de la cirugía por que ya ha pasado más de 1 hora desde que se creó el protocolo quirúgico.');

            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'dni.required' => 'Debe ingresar el dni del paciente.',
            'dni.numeric' => 'El campo DNI debe ser númerico.',
            'name.required' => 'Debe ingresar el nombre del paciente.',
            'os_id.required' => 'Debe seleccionar la obra social del paciente.',
        ];

        $messages['protocol.required'] = "No puede cambiar los datos de la cirugía por que ya ha pasado más de 1 hora desde que se creó el protocolo quirúgico.";

        return $messages;
    }
}
