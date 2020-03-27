<?php

namespace App\Services;

use App\Exports\InternshipBiopsiesExport;
use App\Exports\SurgeryEventExport;
use App\Exports\SurgeryEventsByDateExport;
use App\Models\Doctor;
use App\Models\Os;
use App\Models\PALaboratorySample;
use App\Models\pathologicalAnatomy\PathologicalCategoryClassOne;
use Facades\App\Http\Controllers\HelpersController;
use App\Models\InternshipBiopsies;
use App\Models\Surgery\SurgeryEvent;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class ReportsService
{
    public function internshipBiopsiesReport($documentType, $from, $to)
    {
        ini_set('max_execution_time', 180);

        $biopsies = InternshipBiopsies::whereBetween('created_at',[HelpersController::formatDate($from), HelpersController::formatDate(Carbon::parse($to)->addDay())])->get();

        if($documentType == 'pdf') {

            $pdf = SnappyPdf::loadView('Reports.internship_biopsies.internship_biopsies', [
                'biopsies' => $biopsies
            ]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('BiopsiasDeInternados.pdf');

        } else if($documentType == "excel") {

            return Excel::download(new InternshipBiopsiesExport($from, $to), 'Biopsias_de_internados.xlsx');
        }
    }

    public function SurgeryEventWithXRayReport($documentType)
    {
        $date1 = Carbon::now()->format('Y-m-d H:i:s');
        $date2 = Carbon::now()->addHours(12)->format('Y-m-d H:i:s');

        $date1 = HelpersController::formatDate($date1);

        $date2 = HelpersController::formatDate($date2);

        $events = SurgeryEvent::whereHas('EventData', function ($query) {

            $query->where('x_ray_specialist_needed', 1);

        })->whereBetween('start_date', [$date1, $date2])->get();

        if($documentType == "excel") {

            return Excel::download(new SurgeryEventExport(), 'CirugíasConArcoEnC.xlsx');

        } else if($documentType == "pdf") {

            $pdf = SnappyPdf::loadView('Reports.surgeryEvents.surgeryEventsWithXRay', [
                'events' => $events
            ]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('CirugíasConArcoEnC.pdf');
        }
    }

    public function SurgeryEventsBetweenDatesReport($documentType, $from, $to)
    {
        ini_set('max_execution_time', 180);

        /**
         * The status_id = 2 is the "finished" status, means that the surgery was done and finished.
         */
        $surgeries = SurgeryEvent::join('surgery_event_data', 'surgery_events.id', '=', 'surgery_event_data.surgery_event_id')
            ->whereBetween('surgery_events.start_date',[HelpersController::formatDate($from), HelpersController::formatDate(Carbon::parse($to)->addDay())])
            ->where('surgery_events.status_id', 2)
            ->orderBy('surgery_event_data.os')
            ->get();

        $surgeries = Arr::sort($surgeries, function($surgery) {
            return $surgery->EventData->Os->name;
        });

        $os = [];

        foreach($surgeries as $surgery) {

            if(isset($os[$surgery->EventData->Os->id])) {

                $os[$surgery->EventData->Os->id]["total"] += 1;

            } else {
                $osInfo = Os::find($surgery->EventData->Os->id);
                $os[$surgery->EventData->Os->id]["name"] = $osInfo->name;
                $os[$surgery->EventData->Os->id]["total"] = 1;
            }
        }

        if($documentType == 'pdf') {

            $pdf = SnappyPdf::loadView('Reports.surgeryEvents.betweenDates', [
                'surgeries' => $surgeries,
                'from' => $from,
                'to' => $to,
                'os' => $os]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('ListadoDeCirugias.pdf');

        } else if($documentType == "excel") {

            return Excel::download(new SurgeryEventsByDateExport($from, $to), 'Listado_de_cirugías.xlsx');
        }
    }

    public function SurgeryEventsByDoctorBetweenDatesReport($documentType, $doctorId, $from, $to)
    {
        ini_set('max_execution_time', 180);

        /**
         * The status_id = 2 is the "finished" status, means that the surgery was done and finished.
         */
        $surgeries = SurgeryEvent::join('surgery_event_data', 'surgery_events.id', '=', 'surgery_event_data.surgery_event_id')
            ->whereBetween('surgery_events.start_date',[HelpersController::formatDate($from), HelpersController::formatDate(Carbon::parse($to)->addDay())])
            ->where('surgery_events.status_id', 2)
            ->where('surgery_event_data.surgeon_id', $doctorId)
            ->orderBy('surgery_event_data.os')
            ->get();

        $os = [];

        foreach($surgeries as $surgery) {

            if(isset($os[$surgery->EventData->Os->id])) {

                $os[$surgery->EventData->Os->id]["total"] += 1;

            } else {
                $osInfo = Os::find($surgery->EventData->Os->id);
                $os[$surgery->EventData->Os->id]["name"] = $osInfo->name;
                $os[$surgery->EventData->Os->id]["total"] = 1;
            }
        }

        $surgeon = Doctor::findOrFail($doctorId);

        if($documentType == 'pdf') {

            $pdf = SnappyPdf::loadView('Reports.surgeryEvents.byDoctorBetweenDates', [
                'surgeries' => $surgeries,
                'from' => $from,
                'to' => $to,
                'os' => $os,
                'surgeon' => $surgeon
            ]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('ListadoDeCirugias.pdf');

        } else if($documentType == "excel") {

            return Excel::download(new SurgeryEventsByDateExport($from, $to), 'Listado_de_cirugías.xlsx');
        }
    }

    public function SurgeryDateEventsBetweenDatesReport($documentType, $from, $to)
    {
        ini_set('max_execution_time', 180);

        /**
         * The status_id = 2 is the "finished" status, means that the surgery was done and finished.
         */
        $surgeries = SurgeryEvent::join('surgery_event_data', 'surgery_events.id', '=', 'surgery_event_data.surgery_event_id')
            ->whereBetween('surgery_events.start_date',[HelpersController::formatDate($from), HelpersController::formatDate(Carbon::parse($to)->addDay())])
            ->orderBy('surgery_event_data.os')
            ->get();

        $surgeries = Arr::sort($surgeries, function($surgery) {
            return $surgery->EventData->Os->name;
        });

        $os = [];

        foreach($surgeries as $surgery) {

            if(isset($os[$surgery->EventData->Os->id])) {

                $os[$surgery->EventData->Os->id]["total"] += 1;

            } else {
                $osInfo = Os::find($surgery->EventData->Os->id);
                $os[$surgery->EventData->Os->id]["name"] = $osInfo->name;
                $os[$surgery->EventData->Os->id]["total"] = 1;
            }
        }

        if($documentType == 'pdf') {

            $pdf = SnappyPdf::loadView('Reports.surgeryEvents.datedSurgeriesBetweenDates', [
                'surgeries' => $surgeries,
                'from' => $from,
                'to' => $to,
                'os' => $os]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('ListadoDeCirugias.pdf');

        } else if($documentType == "excel") {

            return Excel::download(new SurgeryEventsByDateExport($from, $to), 'Listado_de_cirugías.xlsx');
        }
    }

    public function nonReceivedPathologicalAnatomySamplesBetweenDates($documentType, $from, $to)
    {
        $samples = PALaboratorySample::whereBetween('created_at', [HelpersController::formatDate($from), HelpersController::formatDate(Carbon::parse($to)->addDay())])
            ->whereNull('received_at')
            ->orderBy('created_at', 'ASC')->get();

        if($documentType == 'pdf') {
            $pdf = SnappyPdf::loadView('Reports.PathologicalAnatomy.nonReceivedSamples', [
                'samples' => $samples,
                'from' => $from,
                'to' => $to,
                ]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('MuestrasNoRecibidas.pdf');
        }
    }

    public function receivedNonReportedPathologicalAnatomySamplesBetweenDates($documentType)
    {
        $samples = PALaboratorySample::whereNotNull('received_at')
                ->doesntHave('medicalReport')
                ->orderBy('received_at', 'ASC')->get();

        if($documentType == 'pdf') {
            $pdf = SnappyPdf::loadView('Reports.PathologicalAnatomy.receivedNonReportedSamples', [
                'samples' => $samples,
            ]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('MuestrasRecibidasNoInformadas.pdf');
        }
    }

    public function pathologicalAnatomyDiagnosticCodes()
    {
        $codes = PathologicalCategoryClassOne::all();

        $pdf = SnappyPdf::loadView('Reports.PathologicalAnatomy.pathologicalAnatomyDiagnosticCodes', [
            'codes' => $codes,
        ]);

        $pdf->setPaper('a4');

        //$pdf->setOrientation('landscape');

        return $pdf->inline('CodigosDeDiagnostico.pdf');
    }

    public function SurgeryEventWithXRayBetweenDatesReport($documentType, $from, $to)
    {
        $date1 = Carbon::parse($from)->format('Y-m-d H:i:s');
        $date2 = Carbon::parse($to)->addHours(12)->format('Y-m-d H:i:s');

        $date1 = HelpersController::formatDate($date1);

        $date2 = HelpersController::formatDate($date2);

        $events = SurgeryEvent::whereHas('EventData', function ($query) {

            $query->where('x_ray_specialist_needed', 1);

        })->whereBetween('start_date', [$date1, $date2])->whereStatusId(2)->get();

        if($documentType == "excel") {

            return Excel::download(new SurgeryEventExport(), 'CirugíasConArcoEnC.xlsx');

        } else if($documentType == "pdf") {

            $pdf = SnappyPdf::loadView('Reports.surgeryEvents.surgeryEventsWithXRayBetweenDates', [
                'events' => $events,
                'from' => $from,
                'to' => $to
            ]);

            $pdf->setPaper('a4');

            $pdf->setOrientation('landscape');

            return $pdf->inline('CirugíasConArcoEnC.pdf');
        }
    }
}