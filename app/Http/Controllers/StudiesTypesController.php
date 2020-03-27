<?php

namespace App\Http\Controllers;

use App\DataTables\StudiesTypesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStudiesTypesRequest;
use App\Http\Requests\UpdateStudiesTypesRequest;
use App\Repositories\StudiesTypesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StudiesTypesController extends AppBaseController
{
    /** @var  StudiesTypesRepository */
    private $studiesTypesRepository;

    public function __construct(StudiesTypesRepository $studiesTypesRepo)
    {
        $this->studiesTypesRepository = $studiesTypesRepo;
    }

    /**
     * Display a listing of the StudiesTypes.
     *
     * @param StudiesTypesDataTable $studiesTypesDataTable
     * @return Response
     */
    public function index(StudiesTypesDataTable $studiesTypesDataTable)
    {
        return $studiesTypesDataTable->render('studies_types.index');
    }

    /**
     * Show the form for creating a new StudiesTypes.
     *
     * @return Response
     */
    public function create()
    {
        return view('studies_types.create');
    }

    /**
     * Store a newly created StudiesTypes in storage.
     *
     * @param CreateStudiesTypesRequest $request
     *
     * @return Response
     */
    public function store(CreateStudiesTypesRequest $request)
    {
        $input = $request->all();

        $studiesTypes = $this->studiesTypesRepository->create($input);

        Flash::success('Tipo de estudio almacenado correctamente.');

        return redirect(route('studiesTypes.index'));
    }

    /**
     * Display the specified StudiesTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $studiesTypes = $this->studiesTypesRepository->findWithoutFail($id);

        if (empty($studiesTypes)) {
            Flash::error('Tipo de estudio no encontrado.');

            return redirect(route('studiesTypes.index'));
        }

        return view('studies_types.show')->with('studiesTypes', $studiesTypes);
    }

    /**
     * Show the form for editing the specified StudiesTypes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $studiesTypes = $this->studiesTypesRepository->findWithoutFail($id);

        if (empty($studiesTypes)) {
            Flash::error('Tipo de estudio no encontrado.');

            return redirect(route('studiesTypes.index'));
        }

        return view('studies_types.edit')->with('studiesTypes', $studiesTypes);
    }

    /**
     * Update the specified StudiesTypes in storage.
     *
     * @param  int              $id
     * @param UpdateStudiesTypesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudiesTypesRequest $request)
    {
        $studiesTypes = $this->studiesTypesRepository->findWithoutFail($id);

        if (empty($studiesTypes)) {
            Flash::error('Tipo de estudio no encontrado.');

            return redirect(route('studiesTypes.index'));
        }

        $studiesTypes = $this->studiesTypesRepository->update($request->all(), $id);

        Flash::success('Tipo de estudio actualizado correctamente.');

        return redirect(route('studiesTypes.index'));
    }

    /**
     * Remove the specified StudiesTypes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studiesTypes = $this->studiesTypesRepository->findWithoutFail($id);

        if (empty($studiesTypes)) {
            Flash::error('Tipo de estudio no encontrado.');

            return redirect(route('studiesTypes.index'));
        }

        $this->studiesTypesRepository->delete($id);

        Flash::success('Tipo de estudio eliminado con éxito.');

        return redirect(route('studiesTypes.index'));
    }
}
