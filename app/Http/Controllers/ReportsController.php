<?php

namespace App\Http\Controllers;

use App\Exports\InternshipBiopsiesExport;
use App\Exports\SpecialistsExport;
use App\Exports\SurgeryEventExport;
use App\Exports\SurgeryEventsByDateExport;
use App\Exports\UsersExport;
use App\Models\InternshipBiopsies;
use App\Models\Os;
use App\Models\Surgery\SurgeryEvent;
use Facades\App\Services\ReportsService;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Maatwebsite\Excel\Facades\Excel;
use Monolog\LoggerTest;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ReportsController extends Controller
{

    public function index()
    {
        return view('Reports.index');
    }


    public function InternshipBiopsies($documentType, $from, $to)
    {
        return ReportsService::internshipBiopsiesReport($documentType, $from, $to);

    }

    public function SurgeryEventsWithXRay($documentType)
    {
        return ReportsService::SurgeryEventWithXRayReport($documentType);

    }

    public function SurgeryEventsWithXRayBetweenDates($documentType, $from, $to)
    {
        return ReportsService::SurgeryEventWithXRayBetweenDatesReport($documentType, $from, $to);
    }

    public function SurgeryEventsBetweenDates($documentType, $from, $to)
    {
        return ReportsService::SurgeryEventsBetweenDatesReport($documentType, $from, $to);
    }

    public function SurgeryDateEventsBetweenDates($documentType, $from, $to)
    {
        return ReportsService::SurgeryDateEventsBetweenDatesReport($documentType, $from, $to);
    }

    public function SurgeryEventsByDoctorBetweenDates($documentType, $doctorId, $from, $to)
    {
        return ReportsService::SurgeryEventsByDoctorBetweenDatesReport($documentType, $doctorId, $from, $to);
    }

    public function nonReceivedPathologicalAnatomySamplesBetweenDates($documentType, $from, $to)
    {
        return ReportsService::nonReceivedPathologicalAnatomySamplesBetweenDates($documentType, $from, $to);
    }

    public function receivedNonReportedPathologicalAnatomySamplesBetweenDates($documentType)
    {
        return ReportsService::receivedNonReportedPathologicalAnatomySamplesBetweenDates($documentType);
    }

    public function pathologicalAnatomyDiagnosticCodes()
    {
        return ReportsService::pathologicalAnatomyDiagnosticCodes();
    }
}
