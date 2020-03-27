<?php

namespace App\Services;

use App\Http\Controllers\pathologicalAnatomy\PathologicalAnatomyTemplatesTitlesController;
use App\Http\Requests\StorePALaboratoryMedicalReportRequest;
use App\Models\GesInMed\ImagesDates;
use App\Models\pathologicalAnatomy\PathologicalAnatomyMedicalReport;
use App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle;
use App\Models\pathologicalAnatomy\PathologicalAnatomyTemplate;
use App\Models\pathologicalAnatomy\PathologicalAnatomyTemplatesTitles;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Facades\App\Http\Controllers\HelpersController;
use App\Models\PALaboratorySample;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use PhpMyAdmin\Server\Status\Data;
use Yajra\DataTables\Facades\DataTables;

class PathologicalAnatomyService
{
    public function dataTable()
    {
        return DataTables::of(PALaboratorySample::query())
            ->editColumn('created_at', function(PALaboratorySample $row) {
                return Carbon::parse($row->created_at)->format('d/m/Y H:i');
            })
            ->editColumn('department_id', function(PALaboratorySample $row) {
                if(isset($row->department->name)) {
                    return $row->department->name;
                }
                return "No indicado.";
            })
            ->editColumn('patient_id', function(PALaboratorySample $row) {
                if(!is_null($row->patient_id)) {
                    return $row->patient->apellido;
                } else if(isset($row->surgeryEvent->EventData->patient_name)) {
                    return $row->surgeryEvent->EventData->patient_name;
                }

                return " ";

            })
            ->editColumn('received_at', function(PALaboratorySample $row) {

                return !is_null($row->received_at) ?  Carbon::parse($row->received_at)->format('d/m/Y H:i') : "NO RECIBIDA";
            })
            ->addColumn('billingCodes', function(PALaboratorySample $row) {
                return view('pathologicalAnatomy.dataTableBillingCodesButton')->with('row',$row);
            })
            ->addColumn('categorize', function(PALaboratorySample $row) {
                return view('pathologicalAnatomy.dataTableCategorizeButton')->with(['row' => $row]);
            })
            ->addColumn('report', function(PALaboratorySample $row) {
                return view('pathologicalAnatomy.dataTableMedicalReportButton')->with(['row' => $row]);
            })
            ->addColumn('validate_medical_report', function(PALaboratorySample $row) {
                return view('pathologicalAnatomy.validateMedicalReportButton')->with(['row' => $row]);
            })
            ->addColumn('actions', function(PALaboratorySample $row) {
                return view('pathologicalAnatomy.dataTableActions')->with(['row' => $row]);
            })
            ->rawColumns(['received_at', 'billingCodes', 'categorize', 'report', 'validate_medical_report', 'actions'])
            ->toJson();
    }

    public function setCategories($sampleId, $data)
    {
        $sample = PALaboratorySample::find($sampleId);

        if (empty($sample)) {
            \Flash::error('Registro no encontrado');

            return redirect(url('/pathologicalAnatomy'));
        }

        $category_one = $data->pathology_category_class_one_id == false ? null : $data->pathology_category_class_one_id;
        $category_two = $data->pathology_category_class_two_id == false ? null : $data->pathology_category_class_two_id;
        $category_three = $data->pathology_category_class_three_id == false ? null : $data->pathology_category_class_three_id;
        $category_four = $data->pathology_category_class_four_id == false ? null : $data->pathology_category_class_four_id;

        PALaboratorySample::where('id', $sampleId)->update([
           'pathological_category_level_one_id' => $category_one,
           'pathological_category_level_two_id' => $category_two,
           'pathological_category_level_three_id' => $category_three,
           'pathological_category_level_four_id' => $category_four,
        ]);

        \Flash::success('Exito al asignar las categorías.');

        return \Response::json("Exito al guardar", 200);
    }

    public function createMedicalReport($sampleId)
    {
        if(null == $sample = PALaboratorySample::find($sampleId)) {
            Flash::error('Muestra no encontrada.');

            return redirect('/pathologicalAnatomy');
        }

        return view('pathologicalAnatomy.medicalReportModal')->with('sample', $sample);
    }

    public function getMedicalReportTitle($titleId)
    {
        if(null == $title = PathologicalAnatomyReportTitle::find($titleId)) {
            Flash::error('Título no encontrado.');

            return \Response::json(['Error' => 'Título no encontrado.'], 404);
        }

        return \Response::json($title->name, 200);
    }

    public function getMedicalReportTemplates($categoryId)
    {
        if(null == $category = PathologicalAnatomyTemplatesTitles::find($categoryId)) {
            Flash::error('Categoría no encontrada.');

            return \Response::json(['Error' => 'Categoría no encontrada.'], 404);
        }

        return view('pathologicalAnatomy.helpers.templatesSelect')->with('category', $category);
    }

    public function getMedicalReportTemplate($templateId)
    {
        if(null == $template = PathologicalAnatomyTemplate::find($templateId)) {
            Flash::error('Plantilla no encontrada.');

            return \Response::json(['Error' => 'Plantilla no encontrada.'], 404);
        }

        return \Response::json($template->description, 200);
    }

    public function storeMedicalReport($PALaboratoryId, $request)
    {
        if(null == $sample = PALaboratorySample::find($PALaboratoryId)) {
            Flash::error('Muestra no encontrada.');
            return \Response::json(["Error" => "Muestra no encontrada."], 404);
        }

        $result = $sample->storeMedicalReport($request->medical_report);

        return \Response::json("/pathologicalAnatomy/printMedicalReport/" . $sample->id, 200);

    }

    public function updateMedicalReport($PALaboratoryId, $request)
    {
        if(null == $sample = PALaboratorySample::find($PALaboratoryId)) {
            Flash::error('Muestra no encontrada.');
            return \Response::json(["Error" => "Muestra no encontrada."], 404);
        }

        $result = $sample->medicalReport->update([
            'medical_report' => $request->medical_report
        ]);

        return \Response::json("/pathologicalAnatomy/printMedicalReport/" . $sample->id, 200);

    }

    public function returnMedicalReportPDF($medicalReport)
    {
        $pdf = SnappyPdf::loadView('pathologicalAnatomy.printMedicalReport', ['medicalReport' => $medicalReport]);

        return $pdf->inline('InformeMedico.pdf');
    }

    public function receiveSample($code)
    {
        if(count($sample = PALaboratorySample::where('code', $code)->get()) < 1) {
            Flash::error('Muestra no encontrada.');
            return redirect(url("/pathologicalAnatomy/receiveSamples"));
        }

        $sample[0]->update([
            'received_at' => HelpersController::formatDate(Carbon::now())
        ]);

        Flash::success('Muestra '. $code .' recibida con éxito.');
        return redirect(url("/pathologicalAnatomy/receiveSamples"));
    }

    public function printSticker($code)
    {
        $pdf = SnappyPdf::loadView('pathologicalAnatomy.printSticker', [
            'code' => $code
        ]);

        $pdf->setOptions([
            'page-width' => '60mm',
            'page-height' => '30mm',
            'margin-top'    => 5,
            'margin-right'  => 0,
            'margin-bottom' => 0,
            'margin-left'   => 0,
        ]);

        return $pdf->inline('EtiquetaPatologica.pdf');
    }

    public function validateMedicalReport($sampleId)
    {
        if(null == $sample = PALaboratorySample::find($sampleId)) {
            Flash::error('Ha ocurrido un error: El código de la muestra es inválido.');

            return \Response::json(["Error" => "Código de muestra inválido"], 404);
        }

        $sample->medicalReport->update([
            'validated_at' => HelpersController::formatDate(Carbon::now()),
            'validated_by' => \Auth::user()->id
        ]);

        Flash::success('Informe '.$sample->code.' validado con éxito.');

        return \Response::json("OK", 200);
    }

    public function unValidateMedicalReport($sampleId)
    {
        if(null == $sample = PALaboratorySample::find($sampleId)) {
            Flash::error('Ha ocurrido un error: El código de la muestra es inválido.');

            return \Response::json(["Error" => "Código de muestra inválido"], 404);
        }

        $sample->medicalReport->update([
            'validated_at' => NULL,
            'validated_by' => NULL
        ]);

        Flash::success('Informe '.$sample->code.' desvalidado con éxito.');

        return \Response::json("OK", 200);
    }

    public function store($request)
    {
        $input = $request->all();

        $sample = PALaboratorySample::create($input);
        $prefix = $input['biopsy_type_id'] == 144 ? "BP-" : "PAP-";
        $code = $prefix . $sample->id;

        $sample->update([
            "code" => $code,
            'received_at' => HelpersController::formatDate(Carbon::now())
        ]);

        return \Response::json("/pathologicalAnatomy/printSticker/" . $code, 200);
    }

    public function informedAPSamplesTable()
    {
        return DataTables::of(PathologicalAnatomyMedicalReport::whereNotNull('validated_at')->with('pathologicalAnatomyLaboratorySample', 'pathologicalAnatomyLaboratorySample.patient', 'pathologicalAnatomyLaboratorySample.surgeryEvent' , 'validatedBy')->select('*'))
                            ->editColumn("created_at", function(PathologicalAnatomyMedicalReport $row) {
                                return Carbon::parse($row->created_at)->format('d/m/Y H:i');
                            })
                            ->addColumn('patient_name', function(PathologicalAnatomyMedicalReport $row) {
                                return $this->findPatientName($row);
                            })
                            ->editColumn("validated_by", function(PathologicalAnatomyMedicalReport $row) {
                                return $row->validatedBy->name;
                            })
                            ->editColumn("validated_at", function(PathologicalAnatomyMedicalReport $row) {
                                return Carbon::parse($row->validated_at)->format('d/m/Y H:i');
                            })
                            ->addColumn('download', function(PathologicalAnatomyMedicalReport $row) {
                                return "<a href='/pathologicalAnatomy/printMedicalReport/{$row->pathologicalAnatomyLaboratorySample->id}' target='_blank' class='btn btn-warning'><i class='fa fa-cloud-download'></i></a>";
                            })
                            ->rawColumns(['download'])
                            ->make(true);
    }

    private function findPatientName($row)
    {
        if(isset($row->pathologicalAnatomyLaboratorySample->patient->apellido))
           return $row->pathologicalAnatomyLaboratorySample->patient->apellido;

        return $row->pathologicalAnatomyLaboratorySample->surgeryEvent->EventData->patient_name;

    }
}