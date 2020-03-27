<?php

namespace App\Services\GesInMed;

use App\Models\GesInMed\Patients;
use \Yajra\DataTables\Facades\DataTables;

class PatientsService
{
    public function dataTable($document)
    {
        return DataTables::of(Patients::select(['CodOS', 'documento', 'apellido', 'cuil'])->where('documento', $document))
                        ->editColumn('CodOS', function(Patients $row) {
                            return $row->medicalInsurance->Descripcion;
                        })
                        ->make();
    }
}
