<?php

namespace App\Http\Controllers\GesInMed;

use Facades\App\Services\GesInMed\PatientsService;

class PatientsController
{

    public function index()
    {
        return view('GesInMed.Patients.table');
    }

    public function dataTable($document)
    {
        return PatientsService::dataTable($document);
    }
}