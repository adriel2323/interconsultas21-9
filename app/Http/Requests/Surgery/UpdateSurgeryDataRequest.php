<?php

namespace App\Http\Requests\Surgery;

use App\Models\Surgery\SurgicalProtocol;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSurgeryDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->hasPermissionTo('surgery.updateSurgeryData')) {
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
        $rules = [
            'surgeon_id' => 'required|exists:doctors,id',
            'surgery_type_id' => 'required|exists:surgery_types,id',
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
            'surgeon_id.required' => 'Debe seleccionar el cirujano que realizará la cirugía.',
            'surgeon_id.exists' => 'El cirujano seleccionado no es válido.',
            'surgery_type_id.required' => 'Debe seleccionar el tipo de cirugía.',
            'surgery_type_id.exists' => 'El tipo de cirugía seleccionada no es válida.',
        ];
        $messages['protocol.required'] = "No puede cambiar los datos de la cirugía por que el protocolo quirugico ya fue realizado.";
        $messages['protocol.required'] = "No puede cambiar los datos de la cirugía por que ya ha pasado más de 1 hora desde que se creó el protocolo quirúgico.";

        return $messages;
    }
}
