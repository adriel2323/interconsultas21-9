<?php

namespace App\Http\Requests\Surgery;

use App\Models\Surgery\SurgeryEvent;
use App\Models\Surgery\SurgicalProtocol;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class dragEventPostRequest extends FormRequest
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
            'id' => 'required',
            'resourceId' => 'required',
            'start' => 'required',
            'end' => 'required',
        ];

        if(!\Auth::user()->hasPermissionTo('surgery.edit')) {

            $rules['permission'] = 'required';

            \Flash::error('Usted no tiene permisos para cambiar el horario de la cirugía.');

        }

        $surgeryEvent = SurgeryEvent::find($this->get('id'));

        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $this->get('id'))->get();

        if(count($surgicalProtocol) > 0) {

            $timeLimit = Carbon::parse($surgicalProtocol[0]->created_at)->addHour();

            $now = Carbon::now();

            if ($timeLimit->greaterThan($now)) {

                $rules['protocol'] = 'required';

                \Flash::error('No puede cambiar los datos de la cirugía por que ya ha pasado más de 1 hora desde que se creó el protocolo quirúgico.');

            }
        }



        if($surgeryEvent->status_id == 2) {

            $rules['finished'] = 'required';
            \Flash::error("No puede modificar el evento porque está marcado como FINALIZADO.");

        }

        return $rules;

    }

    public function messages()
    {
        $messages = [
            'id.required' => 'Ha ocurrido un error de sistema. (FALTA ID).',
            'resourceId.required' => 'Ha ocurrido un error de sistema. (FALTA RESOURCE_ID).',
            'start.required' => 'Ha ocurrido un error de sistema. (FALTA START_DATE).',
            'end.required' => 'Ha ocurrido un error de sistema. (FALTA END_DATE).',
        ];

        $messages['permission.required'] = 'Usted no tiene permisos para cambiar el horario de la cirugía.';

        $messages['protocol.required'] = "No puede cambiar los datos de la cirugía por que ya ha pasado más de 1 hora desde que se creó el protocolo quirúgico.";

        $messages['finished.required'] = "No puede cambiar la fecha de la cirugía porque la misma está marcada como finalizada.";

        return $messages;
    }
}
