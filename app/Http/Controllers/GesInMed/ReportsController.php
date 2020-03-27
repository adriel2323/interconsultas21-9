<?php

namespace App\Http\Controllers\GesInMed;

use App\Models\Doctor;
use App\Models\GesInMed\DerivativeDoctors;
use App\Models\GesInMed\ImagesTurns;
use App\Models\GesInMed\Internment;
use App\Models\GesInMed\InternmentMovement;
use App\Models\GesInMed\Os;
use App\Models\GesInMed\Room;
use App\Models\GesInMed\Speciality;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Dompdf\Dompdf;

class ReportsController extends AppBaseController
{

    public function index()
    {
        return view('GesInMed.Reports.index');
    }

    public function InternmentsByRoomByDate($documentType, $from, $to, $roomId = 'all')
    {
        ini_set('max_execution_time', '300');
        $internments = 0;
        $movements = 0;
        $room = Room::find($roomId);

        if($room == null) {
            \Flash::error('La sala ingresada no es válida. Por favor reintente');

            return redirect('/reports');
        }

        if($documentType == 'pdf') {

            /* Primero busco los admitidos en internacion*/

            if($roomId == 'all') {
                $internments = Internment::whereBetween('Fecha',[Carbon::parse($from)->format('Ymd h:i:s'),Carbon::parse($to)->format('Ymd h:i:s')])
                    ->orderBy('Fecha','DESC')
                    ->orderBy('SalaId','DESC')
                    ->get();

                /*
                 * Luego busco los movimientos de internados
                 */

                $internments += InternmentMovement::whereBetween('Fecha',[Carbon::parse($from)->format('Ymd h:i:s'),Carbon::parse($to)->format('Ymd h:i:s')])
                                                    ->orderBy('Fecha','DESC')
                                                    ->orderBy('SalaId','DESC')
                                                    ->get();

            } else {

                $internments = Internment::whereBetween('Fecha',[Carbon::parse($from)->format('Ymd h:i:s'),Carbon::parse($to)->format('Ymd h:i:s')])
                    ->whereDoesntHave('movements')
                    ->where('SalaId',$roomId)
                    ->orderBy('Fecha','DESC')
                    ->orderBy('SalaId','DESC')
                    ->get();

                $movements = InternmentMovement::whereBetween('Fecha',[Carbon::parse($from)->format('Ymd h:i:s'),Carbon::parse($to)->format('Ymd h:i:s')])
                    ->where('SalaId',$roomId)
                    ->orderBy('Fecha','DESC')
                    ->orderBy('SalaId','DESC')
                    ->get();
            }


        } else {

        }

        $dompdf = new Dompdf();

        $html = view('GesInMed.Reports.InternmentsByRoomByDate.InternmentsByRoomByDate')->with(['internments' => $internments, 'from' => $from, 'to' => $to, 'room' => $room, 'movements' => $movements])->render();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream('InternmentsByRoomByDate');

    }

    public function DerivativeDoctorsDetailed($documentType, $doctor_id, $from, $to)
    {
        ini_set('max_execution_time', '300');
        $doctor = DerivativeDoctors::where('MD_ID', $doctor_id)->get();

        if($doctor == null) {
            \Flash::error('El médico ingresado no es válido. Por favor reintente');

            return redirect('/reports');
        } else {
            $doctor = $doctor[0];
        }

        if($documentType == 'pdf') {

                $derivatives = ImagesTurns::where('IMG_TURNO_MEDICODERIVANTEID',$doctor_id)
                    ->whereBetween('IMG_TURNO_FECHA',[Carbon::parse($from)->subDay()->format('Ymd h:i:s'),Carbon::parse($to)->addDay()->format('Ymd h:i:s')])
                    ->orderBy('IMG_TURNO_FECHA','DESC')
                    ->get();

        } else {

        }

        $dompdf = new Dompdf();

        $html = view('GesInMed.Reports.DerivativeDoctors.DerivativeDoctorsDetailed')->with(['derivatives' => $derivatives, 'doctor' => $doctor])->render();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream('DerivacionesAImagenes');

    }

    public function DerivativeDoctorsQuantities($documentType, $doctor_id, $from, $to)
    {
        ini_set('max_execution_time', '300');
        $doctor = DerivativeDoctors::where('MD_ID', $doctor_id)->get();
        $derivatives = 0;
        if($doctor == null) {
            \Flash::error('El médico ingresado no es válido. Por favor reintente');

            return redirect('/reports');
        } else {
            $doctor = $doctor[0];
        }

        if($documentType == 'pdf') {

            $derivatives = ImagesTurns::where('IMG_TURNO_MEDICODERIVANTEID',$doctor_id)
                ->whereBetween('IMG_TURNO_FECHA',[Carbon::parse($from)->subDay()->format('Ymd h:i:s'),Carbon::parse($to)->addDay()->format('Ymd h:i:s')])
                ->orderBy('IMG_TURNO_FECHA','DESC')
                ->get();

            $i = 0;
            $flag = 0;
            $os = [];
            foreach($derivatives as $derivative) {

                foreach($os as $osName) {

                    if($osName == $derivative->os->Descripcion) {
                        $flag = 1;
                    }

                }

                if($flag == 0) {
                    $os[$i]["os"] = $derivative->os->Descripcion;
                    $os[$i]["study_type"] = $derivative->speciality->Descripcion;
                    $i++;
                }

            }

            $derivatives = $this->getQuantity($os);

        } else {

        }

        \Log::info(print_r($derivatives,true));

        $dompdf = new Dompdf();

        $html = view('GesInMed.Reports.DerivativeDoctors.DerivativeDoctorsQuantities')->with(['derivatives' => $derivatives, 'doctor' => $doctor])->render();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return $dompdf->stream('CantidadDeDerivacionesAImagenes_'.$doctor->MD_MEDICO);

    }

    private function getQuantity($os)
    {
        $specialitiesDerivations = [];
        $i = 0;
        /*
         * Para cada estudio del medico
         */
        foreach($os as $study) {
            $flag = 0;

            /*
             * Verifico si ya tengo asignada la obra social del paciente
             */
            foreach($specialitiesDerivations as $key => $specialityDerivation) {

                if($specialityDerivation['os'] == $study->os->Descripcion) {

                    if($specialitiesDerivations[$key]['speciality'] == $study->speciality->Descripcion) {

                        $specialitiesDerivations[$key]['quantity'] += 1;

                    } else {

                        $specialitiesDerivations[$key]['speciality'] = $study->speciality->Descripcion;
                        $specialitiesDerivations[$key]['quantity'] = 1;

                    }

                } else {

                    $specialitiesDerivations[$i]['os'] = $study->os->Descripcion;
                    $specialitiesDerivations[$i]['quantity'] = 1;

                }

            }

        }
        return $specialitiesDerivations;
    }

    public function InternmentsByRoomByDateTemplate()
    {
        return view('GesInMed.Reports.Include.templates.InternmentsByRoomByDate');
    }

    public function DerivativeDoctorsTemplate()
    {
        return view('GesInMed.Reports.Include.templates.DerivativeDoctors');
    }

    public function doctorsList($documentType)
    {
        ini_set('max_execution_time', '300');
        if($documentType == 'pdf') {

            $doctors = Doctor::orderBy('name')->get();

            $dompdf = new Dompdf();

            $html = view('Reports.Doctors.doctorsList')->with(['doctors' => $doctors])->render();

            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            return $dompdf->stream('Listado_de_Medicos_'.Carbon::now()->format('d-m-Y'));

        }

    }

    public function StudiesByOsBySpeciality($documentType, $specialityID, $from, $to)
    {

        $speciality = Speciality::where('Id',$specialityID)->get();
        if(count($speciality) > 0) {
            $speciality = $speciality[0];
        }

        if($documentType == "pdf") {
            $studies = ImagesTurns::where('IMG_TURNO_ESPECIALIDAD', $specialityID)
                ->whereBetween('IMG_TURNO_FECHA',[Carbon::parse($from)->subDay()->format('Ymd h:i:s'),Carbon::parse($to)->addDay()->format('Ymd h:i:s')])
                ->orderBy('IMG_TURNO_FECHA')
                ->get();

            $dompdf = new Dompdf();

            $html = view('GesInMed.Reports.StudiesByOsBySpeciality.studiesByOsBySpeciality')->with(['studies' => $studies, 'speciality' => $speciality, 'from' => $from, 'to' => $to])->render();

            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            return $dompdf->stream('Listado_de_Estudios_por_os_por_modalidad_'.Carbon::now()->format('d-m-Y'));
        }

    }

    public function StudiesByOsBySpecialityTemplate()
    {
        return view('GesInMed.Reports.Include.templates.studiesByOsBySpecialityTemplate');
    }
}
