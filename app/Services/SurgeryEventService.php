<?php

namespace App\Services;

use App\Models\Doctor;
use App\Models\Os;
use App\Models\PALaboratorySample;
use App\Models\Surgery\SurgeryEvent;
use App\Models\Surgery\SurgeryEventData;
use App\Models\Surgery\SurgeryRoom;
use App\Models\Surgery\SurgeryType;
use App\Models\Surgery\SurgicalProtocol;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class SurgeryEventService
{
    public function render()
    {
        $events = [];
        $since = $this->formatDate(Carbon::now()->subMonth()->format('Ymd'));
        $data = SurgeryEvent::where('start_date', '>', $since)->get();

        if($data->count()) {
            foreach ($data as $key => $value) {

                $title = $value->EventData->patient_name . " (Q". substr($value->surgeryRoom->name, -1). ")" . "\n" . $value->EventData->surgeryType->description . "\n" . $value->EventData->surgeon->name . "\n" . $value->EventData->Os->name;

                $events[] = Calendar::event(
                    $title,
                    false,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    $value->id,
                    // Add color and link on event
                    [
                        'color' => $value->status->color,
                        'resourceId' => $value->resource_id,
                        'resourceEditable' => true,
                        'editable' => true,
                        'handleWindowResize' => true
                    ]
                );

            }
        }

        $calendar = Calendar::addEvents($events);

        $calendar->setOptions([
            'locale' => 'es',
            'navLinks' => true,
            'selectable' => 'true',
            'defaultView' => 'agendaDay',
            'handleWindowResize' => true,
            'themeSystem' => 'standard',
            'schedulerLicenseKey' => 'GPL-My-Project-Is-Open-Source',
            'resources' => [
                ['id' => '1', 'title' => 'Quirófano 1'],
                ['id' => '2', 'title' => 'Quirófano 2'],
                ['id' => '3', 'title' => 'Quirófano 3'],
                ['id' => '4', 'title' => 'Quirófano 4'],
                ['id' => '5', 'title' => 'Quirófano 5'],
                ['id' => '6', 'title' => 'Quirófano 6'],
                ['id' => '7', 'title' => 'Quirófano 7'],
                ['id' => '8', 'title' => 'Hemodinamia 1'],
                ['id' => '9', 'title' => 'Hemodinamia 2'],
                ['id' => '10', 'title' => 'Oftalmología']
            ]
        ]);

        $calendar->setCallbacks([
            'eventDrop' => 'function(event) {
                dragEvent(event);
             }',
            'eventResize' => 'function(event) {
                dragEvent(event);
             }',
            'eventClick' => 'function(calEvent) {
                getEventInfo(calEvent.id);
                
            }',
            'eventRightclick' => 'function(event) {
                eventId = event.id;
            }',
            'dayClick' => 'function(date, jsEvent, view, resource) {
                create_surgery_event(moment(date).format(\'Y-M-D-HHmm\'), resource.id);
            }'
        ]);

        return $calendar;
    }

    public function updateByDragEvent($request)
    {
        /*Id del evento*/
        $eventId = $request->id;

        /*Evento de cirugía*/
        $surgeryEvent = SurgeryEvent::findOrFail($eventId);

        /*Nombre del paciente*/
        $patient_name = $surgeryEvent->EventData->patient_name;

        /*N°de quirófano*/
        $resourceId = $request->resourceId;

        /*Quirofano*/
        $surgeryRoom = SurgeryRoom::find($resourceId);

        /*Tipo de cirugía*/
        $surgeryType = SurgeryType::find($surgeryEvent->EventData->surgery_type_id);

        /*Médico*/
        $doctor = $surgeryEvent->EventData->surgeon;

        /*Obra Social*/
        $os = $surgeryEvent->EventData->Os;

        $patient_name .= " (Q".substr($surgeryRoom->name, -1).")" . "\n" . $surgeryType->description . "\n" . $doctor->name . "\n" . $os->name;

        $start = $this->formatDate(Carbon::parse($request->start)->addHours(3));

        $end = $this->formatDate(Carbon::parse($request->end)->addHours(3));

        $result = SurgeryEvent::where('id', $eventId)->update([
            'title' => $patient_name,
            'resource_id' => $resourceId,
            'start_date' => $start,
            'end_date' => $end,
        ]);

        return $result;

    }

    public function storeEvent($request)
    {
        $start_date = $this->formatDate(Carbon::parse($request->start_date));
        $end_date = $this->formatDate(Carbon::parse($request->end_date));
        $room_id = $request->room_id;
        $patient_document = $request->dni;
        $patient_name = $request->name;
        $os_id = $request->os_id;
        $surgeon_id = $request->surgeon_id;
        $assistants_ids = $request->assistants_ids;
        $surgery_type_id = $request->surgery_type_id;
        $comments = $request->comments;
        $biopsy = $request->biopsy;
        $transitoryCheckIn = $request->transitoryCheckIn;
        $localAnesthesia = $request->localAnesthesia;
        $sedation = $request->sedation;
        $anesthesists = $request->anesthesists;
        $resourceId = $request->resource_id;
        $x_ray_specialist_needed = $request->x_ray_specialist_needed;
        $nurses = $request->nurses;
        $instrumentists = $request->instrumentists;
        $rx_specialists = $request->rx_specialists;
        $originRoomId = $request->origin_room_id;

        /*
         * 'title', 'start_date', 'end_date'
         */
        $surgeryType = SurgeryType::find($surgery_type_id);

        $doctor = Doctor::find($surgeon_id);

        $os = Os::findOrFail($os_id);

        $surgeryRoom = SurgeryRoom::find($resourceId);

        $event = SurgeryEvent::create([
            'title' => $patient_name . " (Q".substr($surgeryRoom->name, -1).")" . "\n" . $surgeryType->description . "\n" . $doctor->name . "\n" . $os->name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'resource_id' => $resourceId,
            'status_id' => 1,
        ]);

        /*
         * 'surgery_event_id',
         * 'room_id'
         * 'os'
         * 'patient_document'
         * 'patient_name'
         * 'surgery_type_id'
         * 'biopsy'
         * 'comments'
         */

        SurgeryEventData::create([
            'surgery_event_id' => $event->id,
            'room_id' => $room_id,
            'os' => $os_id,
            'patient_document' => $patient_document,
            'patient_name' => $patient_name,
            'surgery_type_id' => $surgery_type_id,
            'comments' => $comments,
            'biopsy' => $biopsy,
            'surgeon_id' => $surgeon_id,
            'transitory_check_in' => $transitoryCheckIn,
            'local_anesthesia' => $localAnesthesia,
            'sedation' => $sedation,
            'x_ray_specialist_needed' => $x_ray_specialist_needed,
            'origin_room_id' => $originRoomId
        ]);

        if($biopsy == 1) {
            $code = "QX-" . $event->id;
            $this->createPathologicalAnatomySample($code, $event->id);
        }

        $event = SurgeryEvent::find($event->id);

        $event->assistants()->sync($assistants_ids);

        $event->anesthesists()->sync($anesthesists);

        $event->nurses()->sync($nurses);

        $event->instrumentists()->sync($instrumentists);

        $event->rxSpecialists()->sync($rx_specialists);
    }

    public function updateEvent($request)
    {
        $start_date = $this->formatDate(Carbon::parse($request->start_date));
        $end_date = $this->formatDate(Carbon::parse($request->end_date));

        $room_id = $request->room_id;
        $patient_document = $request->dni;
        $patient_name = $request->name;
        $os_id = $request->os_id;
        $surgeon_id = $request->surgeon_id;
        $assistants_ids = $request->assistants_ids;
        $surgery_type_id = $request->surgery_type_id;
        $comments = $request->comments;
        $resource_id = $request->resource_id;
        $biopsy = $request->biopsy;
        $transitoryCheckIn = $request->transitoryCheckIn;
        $localAnesthesia = $request->localAnesthesia;
        $sedation = $request->sedation;
        $anesthesists = $request->anesthesists;
        $x_ray_specialist_needed = $request->x_ray_specialist_needed;
        $nurses = $request->nurses;
        $instrumentists = $request->instrumentists;
        $rx_specialists = $request->rx_specialists;
        $originRoomId = $request->origin_room_id;
        $resourceId = $request->resource_id;

        /*
         * 'title', 'start_date', 'end_date'
         */
        $surgeryType = SurgeryType::find($surgery_type_id);

        $surgeryRoom = SurgeryRoom::find($resourceId);

        $doctor = Doctor::find($surgeon_id);

        $os = Os::findOrFail($os_id);

        SurgeryEvent::where('id', $request->id)->update([
            'title' => $patient_name . " (Q".substr($surgeryRoom->name, -1).")" . "\n" . $surgeryType->description . "\n" . $doctor->name . "\n" . $os->name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'resource_id' => $resource_id
        ]);

        /*
         * 'surgery_event_id',
         * 'room_id'
         * 'os'
         * 'patient_document'
         * 'patient_name'
         * 'surgery_type_id'
         * 'biopsy'
         * 'comments'
         */
        SurgeryEventData::where('surgery_event_id', $request->id)->update([
            'room_id' => $room_id,
            'os' => $os_id,
            'patient_document' => $patient_document,
            'patient_name' => $patient_name,
            'surgery_type_id' => $surgery_type_id,
            'comments' => $comments,
            'biopsy' => $biopsy,
            'surgeon_id' => $surgeon_id,
            'transitory_check_in' => $transitoryCheckIn,
            'local_anesthesia' => $localAnesthesia,
            'sedation' => $sedation,
            'x_ray_specialist_needed' => $x_ray_specialist_needed,
            'origin_room_id' => $originRoomId
        ]);

        $event = SurgeryEvent::find($request->id);

        $event->assistants()->sync($assistants_ids);

        $event->anesthesists()->sync($anesthesists);

        $event->nurses()->sync($nurses);

        $event->instrumentists()->sync($instrumentists);

        $event->rxSpecialists()->sync($rx_specialists);

        if($biopsy == 1) {
            $code = "QX-" . $event->id;
            $this->createPathologicalAnatomySample($code, $event->id);
        }
    }

    public function changeStatus($request)
    {
        SurgeryEvent::where('id', $request->id)->update([
            'status_id' => $request->status_id
        ]);
    }

    public function updateComments($request)
    {
        $comments = $request->comments;
        SurgeryEventData::where('surgery_event_id', $request->id)->update([
            'comments' => $comments,
        ]);

    }

    public function formatDate($value)
    {
        $date = \Carbon\Carbon::parse($value)->format('Y-m-d');
        $date .= "T";
        $date .= \Carbon\Carbon::parse($value)->format('H:i:s');
        return $date;
    }

    public function updateEventData($request, $id)
    {
        $startDate = $this->formatDate($request->start_date);
        $endDate = $this->formatDate($request->end_date);
        $originRoomId = $request->origin_room_id;
        $roomId = $request->room_id;
        $resourceId = $request->resource_id;
        $transitoryCheckIn = $request->transitory_check_in;

        SurgeryEvent::where('id', $id)->update([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'resource_id' => $resourceId,
        ]);

        SurgeryEventData::where('surgery_event_id', $id)->update([
            'origin_room_id' => $originRoomId,
            'room_id' => $roomId,
            'transitory_check_in' => $transitoryCheckIn
        ]);
    }

    public function updatePatientData($id, $request)
    {
        $dni = $request->dni;
        $name = $request->name;
        $osId = $request->os_id;

        SurgeryEventData::where('surgery_event_id', $id)->update([
            'patient_document' => $dni,
            'patient_name' => $name,
            'os' => $osId
        ]);
    }

    public function updateSurgeryData($id, $request)
    {

        $surgeon_id = $request->surgeon_id;
        $assistants_id = $request->assistants_id;
        $surgery_type_id = $request->surgery_type_id;
        $anesthesists = $request->anesthesists;
        $nurses = $request->nurses;
        $instrumentists = $request->instrumentists;
        $rx_specialists = $request->rx_specialists;
        $biopsy = $request->biopsy;
        $local_anesthesia = $request->local_anesthesia;
        $sedation = $request->sedation;
        $x_ray_specialist_needed = $request->x_ray_specialist_needed;

        SurgeryEventData::where('surgery_event_id', $id)->update([
            'surgeon_id' => $surgeon_id,
            'surgery_type_id' => $surgery_type_id,
            'biopsy' => $biopsy,
            'local_anesthesia' => $local_anesthesia,
            'sedation' => $sedation,
            'x_ray_specialist_needed' => $x_ray_specialist_needed
        ]);

        $event = SurgeryEvent::find($id);

        $event->assistants()->sync($assistants_id);

        $event->anesthesists()->sync($anesthesists);

        $event->nurses()->sync($nurses);

        $event->instrumentists()->sync($instrumentists);

        $event->rxSpecialists()->sync($rx_specialists);

        if($biopsy == 1) {
            $code = "QX-" . $event->id;
            $this->createPathologicalAnatomySample($code, $event->id);
        }

    }
    public function storeSurgicalProtocol($id, $request)
    {
        SurgeryEvent::where('id', $id)->update([
            'status_id' => 2
        ]);

        $surgicalProtocol = SurgicalProtocol::create([
            'surgery_event_id' => $id,
            'perfusion_doctor_id' => $request->perfusion_specialist,
            'service_id' => $request->service_id,
            'pre_operatory_diagnostic' => $request->pre_operatory_diagnostic,
            'surgical_procedure' => $request->surgical_procedure,
            'surgery_schema_description' => $request->surgery_schema_description,
            'start_date' => $this->formatDate($request->start_date),
            'end_date' => $this->formatDate($request->end_date)
        ]);

        return $surgicalProtocol->id;
    }

    public function printSurgicalProtocol($surgicalProtocolId)
    {
        ini_set('max_execution_time', 180);
        $surgicalProtocol = SurgicalProtocol::find($surgicalProtocolId);

        $pdf = SnappyPdf::loadView('surgeryEvents.printSurgicalProtocol',['surgicalProtocol' => $surgicalProtocol]);

        return $pdf->inline('Protocolo_quirugico.pdf');
    }

    public function printSurgicalProtocolBySurgeryEventId($surgeryEventId)
    {
        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $surgeryEventId)->get();

        if(count($surgicalProtocol) < 1) {

            \Flash::error("No se ha encontrado el protocolo solicitado. (Error: Fail to find surgical protocol by surgery event id.)");

            return redirect('/surgery');

        }

        $surgicalProtocol = $surgicalProtocol[0];

        $pdf = SnappyPdf::loadView('surgeryEvents.printSurgicalProtocol',['surgicalProtocol' => $surgicalProtocol]);

        return $pdf->inline('Protocolo_quirugico.pdf');
    }

    public function updateSurgicalProtocol($surgeryEventId, $request)
    {
        $surgeryEvent = SurgeryEvent::find($surgeryEventId);

        $surgicalProtocolId = $surgeryEvent->surgicalProtocol->id;

            $end_date = $this->formatDate($request->end_date);
            $perfusion_specialist = $request->perfusion_specialist;
            $pre_operatory_diagnostic = $request->pre_operatory_diagnostic;
            $service_id = $request->service_id;
            $start_date = $this->formatDate($request->start_date);
            $surgery_schema_description = $request->surgery_schema_description;
            $surgical_procedure = $request->surgical_procedure;

        SurgicalProtocol::where('id', $surgicalProtocolId)->update([
            'perfusion_doctor_id' => $perfusion_specialist,
            'service_id' => $service_id,
            'pre_operatory_diagnostic' => $pre_operatory_diagnostic,
            'surgical_procedure' => $surgical_procedure,
            'surgery_schema_description' => $surgery_schema_description,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        return \Response::json("/surgery/surgicalProtocol/print/" . $surgicalProtocolId, 200);
    }

    public function createPathologicalAnatomySample($code, $id)
    {
        if(count($PASample = PALaboratorySample::where('code', $code)->get()) < 1) {
            PALaboratorySample::create([
                'code' => $code,
                'institution_id' => 1,
                'department_id' => 2,
                'surgery_event_id' => $id,
            ]);
        }
    }
}


