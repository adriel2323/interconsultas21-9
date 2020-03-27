<?php

namespace App\Http\Controllers;

use App\Http\Requests\Surgery\ChangeEventStatus;
use App\Http\Requests\Surgery\DestroyEventRequest;
use App\Http\Requests\Surgery\dragEventPostRequest;
use App\Http\Requests\Surgery\isSurgicalProtocolEditableRequest;
use App\Http\Requests\Surgery\StoreSurgeryEvent;
use App\Http\Requests\Surgery\storeSurgicalProtocol;
use App\Http\Requests\Surgery\UpdateCommentsRequest;
use App\Http\Requests\Surgery\UpdateEventDataRequest;
use App\Http\Requests\Surgery\UpdatePatientDataRequest;
use App\Http\Requests\Surgery\UpdateSurgeryDataRequest;
use App\Http\Requests\Surgery\UpdateSurgeryEventRequest;
use App\Http\Requests\Surgery\UpdateSurgicalProtocolRequest;
use App\Models\Doctor;
use App\Models\Os;
use App\Models\Surgery\SurgeryDoctorParticipation;
use App\Models\Surgery\SurgeryEventData;
use App\Models\Surgery\SurgeryRoom;
use App\Models\Surgery\SurgeryType;
use App\Models\Surgery\SurgeryEvent;
use App\Models\Surgery\SurgicalProtocol;
use Facades\App\Http\Controllers\HelpersController;
use Facades\App\Services\SurgeryEventService;
use Carbon\Carbon;
use Doctrine\Common\Persistence\Event\LoadClassMetadataEventArgs;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Yajra\DataTables\Facades\DataTables;

class SurgeryController extends Controller
{
    public function index()
    {
        $calendar = SurgeryEventService::render();

        return view('surgeryEvents.index', compact('calendar'));
    }

    function dragEvent(dragEventPostRequest $request)
    {
        $result = SurgeryEventService::updateByDragEvent($request);

        if($result) {
            return \Response::json("OK",200);
        }

        return \Response::json(["Error" => "Hubo un error al cambiar el evento.", 400]);

    }

    public function create($date = null, $resourceId = null)
    {
        return view('surgeryEvents.create')->with(['date' => $date, 'resourceId' => $resourceId]);
    }

    public function store(StoreSurgeryEvent $request)
    {
        SurgeryEventService::storeEvent($request);

        \Flash::success('Evento agregado correctamente.');

        return \Response::json('Exito.',200);
    }

    public function getEventInfo($surgeryEventId)
    {
        $surgeryEvent = SurgeryEvent::findorFail($surgeryEventId);

        return view('surgeryEvents.update')->with(['surgeryEvent' => $surgeryEvent]);
    }

    public function update(UpdateSurgeryEventRequest $request)
    {
        SurgeryEventService::updateEvent($request);

        \Flash::success('Evento actualizado correctamente.');

        return \Response::json('Exito.',200);
    }

    public function changeEventStatus(ChangeEventStatus $request)
    {
        SurgeryEventService::changeStatus($request);

        \Flash::success('Evento Actualizado');

        return \Response::json('Ok', 200);
    }

    public function destroy(DestroyEventRequest $request)
    {
        SurgeryEvent::where('id', $request->event_id)->delete();

        \Flash::success('Evento eliminado con éxito');

        return \Response::json('OK',200);
    }

    public function updateComments(UpdateCommentsRequest $request)
    {
        SurgeryEventService::updateComments($request);

        \Flash::success('Comentarios actualizados con éxito');

        return \Response::json('OK',200);
    }

    public function updateEventData($id, UpdateEventDataRequest $request)
    {
        SurgeryEventService::updateEventData($request, $id);

        \Flash::success('Datos de turno actualizados con éxito');

        return \Response::json('OK',200);
    }

    public function updatePatientData($id, UpdatePatientDataRequest $request)
    {
        SurgeryEventService::updatePatientData($id, $request);

        \Flash::success('Datos de paciente actualizados con éxito');

        return \Response::json('OK',200);
    }

    public function updateSurgeryData($id, UpdateSurgeryDataRequest $request)
    {
        SurgeryEventService::updateSurgeryData($id, $request);

        \Flash::success('Datos de cirugía actualizados con éxito');

        return \Response::json('OK',200);
    }

    public function list()
    {
        return view('surgeryEvents.list');
    }

    public function dataTable($date)
    {
        $date = HelpersController::formatDate($date);
        $datePlusDay = Carbon::parse($date)->addHours(24);
        $datePlusDay = HelpersController::formatDate($datePlusDay);
        $query = SurgeryEvent::whereBetween('start_date', [$date, $datePlusDay]);
        return Datatables::of($query)
                            ->editColumn('start_date', function(SurgeryEvent $row) {
                                return Carbon::parse($row->start_date)->format('d/m/Y H:i');
				
                            })
                            ->addColumn('name', function(SurgeryEvent $row) {
                                return $row->EventData->patient_name;
                            })
                            ->editColumn('resource_id', function(SurgeryEvent $row) {
                                return $row->surgeryRoom->name;
                            })
                            ->editColumn('status_id', function(SurgeryEvent $row) {
                                return "<div class='form-group'><button class='btn form-control' style='background-color: " . $row->status->color . ";.'>" .$row->status->name . "</button></div>";
                            })
                            ->addColumn('surgery_type_id', function(SurgeryEvent $row) {

                                if(isset($row->EventData->surgeryType)) {

                                    return $row->EventData->surgeryType->description;

                                }

                                \Log::error("Error en tipo de cirugia en evento ID: ".$row->id);

                                return "";
                            })
                            ->addColumn('os', function(SurgeryEvent $row) {
                                return $row->EventData->Os->name;
                            })
                            ->addColumn('surgeon', function(SurgeryEvent $row) {
                                return $row->EventData->surgeon->name;
                            })
                            ->addColumn('actions', function(SurgeryEvent $row) {
                                return '<button onclick="getEventInfo('.$row->id.')" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i></button><a href="/surgery/surgicalProtocol/printBySurgeryEventId/'.$row->id.'" class="btn btn-xs btn-primary" title="Imprimir protocolo quirúrgico"><i class="fa fa-print"></i></a><button title="Crear / Editar protocolo quirurgico" onclick="isSurgicalProtocolCreated('.$row->id.')" class="btn btn-xs btn-warning"><i class="fa fa-file-pdf-o"></i></button>';
                            })
                            ->rawColumns(['status_id', 'actions'])
                            ->make(true);

    }

    public function createSurgicalProtocol($surgeryId)
    {
        $surgery = SurgeryEvent::find($surgeryId);

        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $surgeryId)->get();

        if(count($surgicalProtocol) < 1) {

            return view('surgeryEvents.createSurgicalProtocol')->with(['id' => $surgeryId, 'surgery' => $surgery]);

        }

        $this->printSurgicalProtocol($surgicalProtocol[0]->id);
    }

    public function storeSurgicalProtocol($id, storeSurgicalProtocol $request)
    {
        $surgicalProtocolId = SurgeryEventService::storeSurgicalProtocol($id, $request);

        \Flash::success("Protocolo creado con éxito.");

        return \Response::json("/surgery/surgicalProtocol/print/" . $surgicalProtocolId, 200);
    }

    public function printSurgicalProtocol($surgicalProtocolId)
    {
        return SurgeryEventService::printSurgicalProtocol($surgicalProtocolId);
    }

    public function existsSurgicalProtocol($surgeryEventId)
    {
        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $surgeryEventId)->get();


        if(count($surgicalProtocol) < 1) {

           return 0;

        }

        return 1;
    }

    public function isSurgicalProtocolEditable($surgeryEventId)
    {
        $surgicalProtocol = SurgicalProtocol::where('surgery_event_id', $surgeryEventId)->get();

        $isEditable = 0;

        if (count($surgicalProtocol) > 0) {

            $timeLimit = Carbon::parse($surgicalProtocol[0]->created_at)->addHour();

            $now = Carbon::now();

            if ($timeLimit->greaterThan($now)) {

                $isEditable = 1;

            }

            return $isEditable;

        }
    }

    public function printSurgicalProtocolBySurgeryEventId($surgeryEventId)
    {
        return SurgeryEventService::printSurgicalProtocolBySurgeryEventId($surgeryEventId);
    }

    public function surgicalProtocolIsEditableModal($surgeryEventId)
    {
        return view('helpers.surgeryEvents.EditableSurgicalProtocolModal')
                   ->with(['surgeryEventId' => $surgeryEventId]);
    }

    public function editSurgicalProtocol($surgeryEventId)
    {
        $surgeryEvent = SurgeryEvent::findOrFail($surgeryEventId);
        return view("surgeryEvents.editSurgicalProtocol")->with([
            'surgery' => $surgeryEvent
        ]);
    }

    public function updateSurgicalProtocol($surgeryEventId, UpdateSurgicalProtocolRequest $request)
    {
        return SurgeryEventService::updateSurgicalProtocol($surgeryEventId, $request);
    }
}
