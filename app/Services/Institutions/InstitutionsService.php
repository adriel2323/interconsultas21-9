<?php

namespace App\Services\Institutions;

use App\Models\Institutions\Institution;
use Yajra\DataTables\Facades\DataTables;

class InstitutionsService
{
    public function dataTable()
    {
        return DataTables::collection(Institution::orderBy('name', 'ASC')->get())
                ->addColumn('actions', function(Institution $row) {
                    return view('Institutions.dataTableActions')->with(['row' => $row]);
                })
                ->rawColumns(['actions'])
                ->make();
    }
}