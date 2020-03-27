<?php

namespace App\Http\Requests\Surgery;

use App\Models\Surgery\SurgeryEvent;
use App\Models\Surgery\SurgicalProtocol;
use Illuminate\Foundation\Http\FormRequest;

class storeSurgicalProtocol extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->hasPermissionTo('surgery.createSurgicalProtocol')) {
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
        $rules = SurgicalProtocol::$rules;

        $surgeryEvent = SurgeryEvent::find($this->route()->parameter('surgeryEventId'));

        if(!empty($surgeryEvent)) {

            if(count($surgeryEvent->anesthesists) < 1 && $surgeryEvent->EventData->local_anesthesia != 1) {

                $rules['anesthesists'] = 'required';

            }

            if(empty($surgeryEvent->EventData->surgeon)) {

                $rules['surgeon_id'] = 'required';

            }
        }

        return $rules;
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        $messages = SurgicalProtocol::$messages;

        $messages['anesthesists.required'] = 'No hay anestesistas cargados en la cirugía.';

        $messages['surgeon_id.required'] = 'No hay un cirujano asignado a la cirugía.';

        return $messages;
    }


}
