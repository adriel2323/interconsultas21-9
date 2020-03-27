<?php

namespace App\Http\Requests\Surgery;

use App\Models\Surgery\SurgeryEvent;
use App\Models\Surgery\SurgicalProtocol;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->hasPermissionTo('surgery.updateSurgeryEventData')) {
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
            'start_date' => 'required|after_or_equal:today',
            'end_date' => 'required|after_or_equal:start_date',
        ];

        $startDate = Carbon::parse($this->get('start_date'));

        $endDate = Carbon::parse($this->get('end_date'));

        $resourceId = $this->get('resource_id');

        $events = SurgeryEvent::whereDate('start_date', '>=', Carbon::today()->format('ymd'))
                                ->where('resource_id', $resourceId)
                                ->where('id', '<>', $this->route()->parameter('surgeryEventId'))
                                ->get();

        $freeEvent = true;

        foreach($events as $event) {
            if($this->checkDate($event->start_date, $event->end_date, $startDate, $endDate)) {
                $freeEvent = false;
            }
        }

        if(!$freeEvent) {
            $rules['reserved_date'] = 'required';
        }

        if(!\Auth::user()->hasPermissionTo('surgery.updateSurgeryEventData')) {

            $rules['permission'] = 'required';

        }

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

    private function checkDate($ReservationFromDate, $ReservationToDate, $fromDate, $toDate) {

        /*
         * $ReservationFromDate => Fecha de inicio de la reserva que se esta checkeando
         * $ReservationToDate => Fecha de fin de la reserva que se esta checkeando
         * $fromDate => Fecha de inicio de la nueva reserva
         * $toDate => Fecha de fin de la nueva reserva
         * Devuelvo TRUE si está reservada o FALSE si está libre en la fecha indicada
         */

        /*
         * 1er caso
         */
        $ReservationFromDate = Carbon::parse($ReservationFromDate);
        $fromDate = Carbon::parse($fromDate);
        $toDate = Carbon::parse($toDate);
        $ReservationToDate = Carbon::parse($ReservationToDate);

        /*
         * 1er caso
         */
        if($ReservationFromDate->gt($fromDate) && $ReservationFromDate->eq($toDate) && $ReservationToDate->gt($fromDate) && $ReservationToDate->gt($toDate)) {
            return false;
        }

        /*
         * 2do caso
         */

        if($ReservationFromDate->gt($fromDate) && $ReservationFromDate->lt($toDate) && $ReservationToDate->gt($fromDate) && $ReservationToDate->gt($toDate)) {
            return true;
        }

        /*
         * 3er caso
         */

        if($ReservationFromDate->lt($fromDate) && $ReservationFromDate->lt($toDate) && $ReservationToDate->gt($fromDate) && $ReservationToDate->eq($toDate)) {
            return true;
        }

        /*
         * 4to caso
         */

        if($ReservationFromDate->lt($fromDate) && $ReservationFromDate->lt($toDate) && $ReservationToDate->eq($fromDate) && $ReservationToDate->lt($toDate)) {
            return false;
        }

        /*
         * 5to caso
         */
        if($ReservationFromDate->lt($fromDate) && $ReservationFromDate->lt($toDate) && $ReservationToDate->gt($fromDate) && $ReservationToDate->lt($toDate)) {
            return true;
        }

        /*
         * 6to caso
         */
        if($ReservationFromDate->lt($fromDate) && $ReservationFromDate->lt($toDate) && $ReservationToDate->gt($fromDate) && $ReservationToDate->gt($toDate)) {
            return true;
        }

        /*
         * 7mo caso
         */
        if($ReservationFromDate->gt($fromDate) && $ReservationFromDate->gt($toDate) && $ReservationToDate->gt($fromDate) && $ReservationToDate->gt($toDate)) {
            return false;
        }

        /*
         * 8vo caso
         */
        if($ReservationFromDate->gt($fromDate) && $ReservationFromDate->lt($toDate) && $ReservationToDate->gt($fromDate) && $ReservationToDate->lt($toDate)) {
            return true;
        }

        /*
         * 9no caso
         */
        if($ReservationFromDate->eq($fromDate) && $ReservationToDate->eq($toDate)) {
            return true;
        }

        /*
         * 10mo caso
         */
        if($ReservationFromDate->eq($fromDate) && $ReservationFromDate->eq($toDate)) {
            return true;
        }

        /*
         * 11avo caso
         */
        if($ReservationToDate->eq($fromDate) && $ReservationToDate->eq($toDate)) {
            return false;
        }

        /*
         * 12Avo caso
         */
        if($ReservationFromDate->lt($fromDate) && $ReservationFromDate->lt($toDate) && $ReservationToDate->lt($fromDate) && $ReservationToDate->lt($toDate)) {
            return false;
        }

        return true;
    }
}
