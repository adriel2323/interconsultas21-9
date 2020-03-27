<?php

namespace App\Http\Controllers\Institutions;

use App\Http\Requests\Institutions\StoreInstitutionRequest;
use App\Http\Requests\Institutions\UpdateInstitutionRequest;
use App\Models\Institutions\Institution;
use Facades\App\Services\Institutions\InstitutionsService;

class InstitutionsController
{
    public function index()
    {
        return view('Institutions.index');
    }

    public function create()
    {
        return view('Institutions.create');
    }

    public function store(StoreInstitutionRequest $request)
    {
        $input = $request->all();
        Institution::create($input);
        \Flash::success('Institución creada con éxito');
        return redirect(route('institutions.index'));
    }

    public function edit($institutionId)
    {
        if(null == $institution = Institution::find($institutionId)) {
            \Flash::error('Institución no encontrada.');
            return redirect(route('institutions.index'));
        }

        return view('Institutions.edit')->with(['institution' => $institution]);
    }

    public function update($institutionId, UpdateInstitutionRequest $request)
    {
        if(null == $institution = Institution::find($institutionId)) {
            \Flash::error('Institución no encontrada.');
            return redirect(route('institutions.index'));
        }

        $input = $request->all();

        $institution->update($input);

        \Flash::success('Institución actualizada con éxito');

        return redirect(route('institutions.index'));

    }

    public function destroy($institutionId)
    {
        if(null == $institution = Institution::find($institutionId)) {
            \Flash::error('Institución no encontrada.');
            return redirect(route('institutions.index'));
        }

        $institution->delete();

        \Flash::success('Institución eliminada con éxito');

        return redirect(route('institutions.index'));

    }

    public function dataTable()
    {
        return InstitutionsService::dataTable();
    }
}