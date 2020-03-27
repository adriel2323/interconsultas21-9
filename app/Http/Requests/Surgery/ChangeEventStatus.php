<?php

namespace App\Http\Requests\Surgery;

use App\Models\Surgery\SurgicalProtocol;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ChangeEventStatus extends FormRequest
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
        $rules['status_id'] = 'required|exists:event_status,id';

        $rules['id'] = 'required|exists:surgery_events,id';

        if(!\Auth::user()->hasPermissionTo('surgery.changeStatus')) {
            $rules['permission'] = 'required';
        }

        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $this->get('id'))->get();

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

        $messages['status_id.required'] = 'Ocurrio un error de sistema. Por favor contáctese con el depto. de Informática. (Error: Falta STATUS_ID).';
        $messages['id.required'] = 'Ocurrio un error de sistema. Por favor contáctese con el depto. de Informática. (Error: Falta SURGERY_ID).';
        $messages['status_id.exists'] = 'Ocurrio un error de sistema. Por favor contáctese con el depto. de Informática. (Error: No existe el estado).';
        $messages['id.exists'] = 'Ocurrio un error de sistema. Por favor contáctese con el depto. de Informática. (Error: No existe el evento).';
        $messages['permission.required'] = 'Usted no tiene permisos para cambiar el estado de la cirugía.';
        $messages['protocol.required'] = "No puede cambiar los datos de la cirugía por que ya ha pasado más de 1 hora desde que se creó el protocolo quirúgico.";

        return $messages;
    }
}
