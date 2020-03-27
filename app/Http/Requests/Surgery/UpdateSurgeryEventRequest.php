<?php

namespace App\Http\Requests\Surgery;

use App\Models\Surgery\SurgicalProtocol;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSurgeryEventRequest extends FormRequest
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
            'start_date' => 'required|after_or_equal:today',
            'end_date' => 'required|after_or_equal:start_date',
            'dni' => 'required|numeric',
            'name' => 'required',
            'os_id' => 'required|exists:os,id',
            'surgeon_id' => 'required|exists:doctors,id',
            'surgery_type_id' => 'required|exists:surgery_types,id',
            'resource_id' => 'required|exists:surgery_rooms,id'
        ];

        if(!\Auth::user()->hasPermissionTo('surgery.edit')) {
            $rules['permission'] = 'required';
        }

//        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $this->get('id'))->get();
//
//        if(count($surgicalProtocol) > 0) {
//
//            $timeLimit = Carbon::parse($surgicalProtocol[0]->created_at)->addHour();
//
//            $now = Carbon::now();
//
//        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'start_date.required' => 'Debe ingresar la hora de inicio de la cirugía.',
            'end_date.required' => 'Debe ingresar la hora de finalización de la cirugía.',
            'start_date.after_or_equal' => 'La fecha de inicio de la cirugía no puede ser anterior al día de hoy.',
            'end_date.after_or_equal' => 'La fecha de finalización de la cirugía debe ser mayor a la fecha de inicio de la misma.',
            'room_id.required' => 'Debe seleccionar la habitación a la que se moverá el paciente luego de la cirugía.',
            'room_id.exists' => 'La habitación seleccionada no es válida.',
            'dni.required' => 'Debe ingresar el dni del paciente.',
            'dni.numeric' => 'El campo DNI debe ser númerico.',
            'name.required' => 'Debe ingresar el nombre del paciente.',
            'os_id.required' => 'Debe seleccionar la obra social del paciente.',
            'os_id.exists' => 'La obra social seleccionada no es válida.',
            'surgeon_id.required' => 'Debe seleccionar el cirujano que realizará la cirugía.',
            'surgeon_id.exists' => 'El cirujano seleccionado no es válido.',
            'surgery_type_id.required' => 'Debe seleccionar el tipo de cirugía.',
            'surgery_type_id.exists' => 'El tipo de cirugía seleccionada no es válida.',
            'resource_id.required' => 'Debe seleccionar el quirófano.',
            'resource_id.exists' => 'Ocurrió un error de sistema. Contáctese con el departamento de informática. (Error: NO EXISTE RESOURCE_ID)',
        ];
        $messages['permission.required'] = 'Usted no tiene permisos para cambiar los datos de la cirugía.';
        $messages['protocol.required'] = "No puede cambiar los datos de la cirugía por que ya ha pasado más de 1 hora desde que se creó el protocolo quirúgico.";

        return $messages;
    }
}
