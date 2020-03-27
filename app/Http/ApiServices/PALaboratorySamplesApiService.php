<?php

namespace App\Http\ApiServices;

use App\Models\GesInMed\ImagesDates;
use App\Models\PALaboratorySample;
use Carbon\Carbon;

class PALaboratorySamplesApiService
{
    public function store($input)
    {
        $isCreated = $this->isCreated($input);

        if(!$isCreated) {

            $cdiDate = ImagesDates::where('IMG_TURNO_ID', $input['cdiDateId'])->get();
            $cdiDate = $cdiDate[0];
            $code = "CDI-".$input['cdiDateId'];

            $pALaboratorySamples = PALaboratorySample::create([
                'code' => $code,
                'patient_id' => $cdiDate->patient->cuil,
                'department_id' => $input['departmentId'],
                'cdi_date_id' => $input['cdiDateId'],
            ]);

            return $pALaboratorySamples;
        }

        $code = "CDI-".$input['cdiDateId'];

        $pALaboratorySample = PALaboratorySample::where('code', $code)->get();

        return $pALaboratorySample[0];
    }

    private function isCreated($input)
    {
        $code = "CDI-".$input['cdiDateId'];

        $pALaboratorySample = PALaboratorySample::where('code', $code)->get();

        return count($pALaboratorySample) < 1 ? false : true;

    }
}