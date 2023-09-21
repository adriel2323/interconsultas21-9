<?php

namespace App\Http\Controllers\pathologicalAnatomy;

use App\Http\Requests\pathologicalAnatomy\StorePathologicalAnatomyRequest;
use App\Http\Requests\ReceivePASampleRequest;
use App\Http\Requests\receivePathologicalAnatomySampleRequest;
use App\Http\Requests\setPathologicalAnatomyCategoriesRequest;
use App\Http\Requests\StorePALaboratoryMedicalReportRequest;
use App\Http\Requests\UnValidatePAMedicalReportRequest;
use App\Http\Requests\UpdatePALaboratoryMedicalReport;
use App\Http\Requests\ValidatePAMedicalReportRequest;
use App\Models\PALaboratorySample;
use App\Models\pathologicalAnatomy\PathologicalAnatomyMedicalReport;
use Facades\App\Services\PathologicalAnatomyService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class pathologicalAnatomyController extends Controller
{
    public function index()
    {
        return view('pathologicalAnatomy.index');
    }

    public function dataTable()
    {
        return PathologicalAnatomyService::dataTable();
    }

    public function setCategoriesModal($sampleId)
    {
        $sample = PALaboratorySample::find($sampleId);
        return view('pathologicalAnatomy.setCategoriesModal')->with(['sample' => $sample]);
    }

    public function setCategories($sampleId, setPathologicalAnatomyCategoriesRequest $data)
    {
        return PathologicalAnatomyService::setCategories($sampleId, $data);
    }

    public function createMedicalReport($sampleId)
    {
        return PathologicalAnatomyService::createMedicalReport($sampleId);
    }

    public function getMedicalReportTitle($titleId)
    {
        return PathologicalAnatomyService::getMedicalReportTitle($titleId);
    }

    public function getMedicalReportTemplates($categoryId)
    {
        return PathologicalAnatomyService::getMedicalReportTemplates($categoryId);
    }

    public function getMedicalReportTemplate($templateId)
    {
        return PathologicalAnatomyService::getMedicalReportTemplate($templateId);
    }

    public function storeMedicalReport($PALaboratoryId, StorePALaboratoryMedicalReportRequest $request)
    {
        return PathologicalAnatomyService::storeMedicalReport($PALaboratoryId, $request);
    }

    public function editMedicalReport($PALaboratoryId)
    {
        if(count($medicalReport = PathologicalAnatomyMedicalReport::where('pathological_anatomy_laboratory_sample_id', $PALaboratoryId)->get()) < 1) {
            \Flash::error("Informe no encontrado");

            return redirect('/pathologicalAnatomy');
        }

        return view('pathologicalAnatomy.editMedicalReportModal')->with('medicalReport', $medicalReport[0]);

    }

    public function updateMedicalReport($PALaboratoryId, UpdatePALaboratoryMedicalReport $request)
    {
        return PathologicalAnatomyService::updateMedicalReport($PALaboratoryId, $request);
    }

    public function printMedicalReport($sampleId)
    {
        if(null == $medicalReport = PathologicalAnatomyMedicalReport::where('pathological_anatomy_laboratory_sample_id', $sampleId)->get()) {
            \Flash::error("Informe no encontrado");

            return redirect('/pathologicalAnatomy');
        }

        return PathologicalAnatomyService::returnMedicalReportPDF($medicalReport[0]);
    }

    public function receiveSamples()
    {
        return view('pathologicalAnatomy.receiveSamples');
    }

    public function receiveSample(ReceivePASampleRequest $request)
    {
        return PathologicalAnatomyService::receiveSample($request->code);
    }

    public function printSticker($code)
    {
        return PathologicalAnatomyService::printSticker($code);
    }

    public function validateMedicalReport($sampleId, ValidatePAMedicalReportRequest $request)
    {
        return PathologicalAnatomyService::validateMedicalReport($sampleId);
    }

    public function unValidateMedicalReport($sampleId, UnValidatePAMedicalReportRequest $request)
    {
        return PathologicalAnatomyService::unValidateMedicalReport($sampleId);
    }

    public function create()
    {
        return view('pathologicalAnatomy.create');
    }

    public function store(StorePathologicalAnatomyRequest $request)
    {
        return PathologicalAnatomyService::store($request);
    }

    public function setBillingCodes($sampleId)
    {
        return view('pathologicalAnatomy.setBillingCodes')->with('sampleId', $sampleId);
    }

    public function informedAPSamplesTable()
    {
        return PathologicalAnatomyService::informedAPSamplesTable();
    }

    public function informedAPSamples()
    {
        return view('pathologicalAnatomy.InformedSamples');
    }

    public function destroy($id)
    {
        if(null == $sample = PALaboratorySample::find($id)) {
            \Flash::error("Muestra no encontrada");
            return redirect('/pathologicalAnatomy');
        }

        $sample->delete();
        \Flash::success("Muestra eliminada con éxito");
        return redirect('/pathologicalAnatomy');
    }
}

