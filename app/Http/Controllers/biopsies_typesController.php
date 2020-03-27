<?php

namespace App\Http\Controllers;

use App\DataTables\biopsies_typesDataTable;
use App\Http\Requests;
use App\Http\Requests\Createbiopsies_typesRequest;
use App\Http\Requests\Updatebiopsies_typesRequest;
use App\Repositories\biopsies_typesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class biopsies_typesController extends AppBaseController
{
    /** @var  biopsies_typesRepository */
    private $biopsiesTypesRepository;

    public function __construct(biopsies_typesRepository $biopsiesTypesRepo)
    {
        $this->biopsiesTypesRepository = $biopsiesTypesRepo;
    }

    /**
     * Display a listing of the biopsies_types.
     *
     * @param biopsies_typesDataTable $biopsiesTypesDataTable
     * @return Response
     */
    public function index(biopsies_typesDataTable $biopsiesTypesDataTable)
    {
        return $biopsiesTypesDataTable->render('biopsies_types.index');
    }

    /**
     * Show the form for creating a new biopsies_types.
     *
     * @return Response
     */
    public function create()
    {
        return view('biopsies_types.create');
    }

    /**
     * Store a newly created biopsies_types in storage.
     *
     * @param Createbiopsies_typesRequest $request
     *
     * @return Response
     */
    public function store(Createbiopsies_typesRequest $request)
    {
        $input = $request->all();

        $biopsiesTypes = $this->biopsiesTypesRepository->create($input);

        Flash::success('Tipo de biopsia almacenada correctamente.');

        return redirect(route('biopsiesTypes.index'));
    }

    /**
     * Display the specified biopsies_types.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $biopsiesTypes = $this->biopsiesTypesRepository->findWithoutFail($id);

        if (empty($biopsiesTypes)) {
            Flash::error('Tipo de biopsia no encontrada.');

            return redirect(route('biopsiesTypes.index'));
        }

        return view('biopsies_types.show')->with('biopsiesTypes', $biopsiesTypes);
    }

    /**
     * Show the form for editing the specified biopsies_types.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $biopsiesTypes = $this->biopsiesTypesRepository->findWithoutFail($id);

        if (empty($biopsiesTypes)) {
            Flash::error('Tipo de biopsia no encontrada.');

            return redirect(route('biopsiesTypes.index'));
        }

        return view('biopsies_types.edit')->with('biopsiesTypes', $biopsiesTypes);
    }

    /**
     * Update the specified biopsies_types in storage.
     *
     * @param  int              $id
     * @param Updatebiopsies_typesRequest $request
     *
     * @return Response
     */
    public function update($id, Updatebiopsies_typesRequest $request)
    {
        $biopsiesTypes = $this->biopsiesTypesRepository->findWithoutFail($id);

        if (empty($biopsiesTypes)) {
            Flash::error('Biopsies Types no encontrado/a.');

            return redirect(route('biopsiesTypes.index'));
        }

        $biopsiesTypes = $this->biopsiesTypesRepository->update($request->all(), $id);

        Flash::success('Tipo de biopsia actualizada correctamente.');

        return redirect(route('biopsiesTypes.index'));
    }

    /**
     * Remove the specified biopsies_types from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $biopsiesTypes = $this->biopsiesTypesRepository->findWithoutFail($id);

        if (empty($biopsiesTypes)) {
            Flash::error('Tipo de biopsia no encontrada.');

            return redirect(route('biopsiesTypes.index'));
        }

        $this->biopsiesTypesRepository->delete($id);

        Flash::success('Tipo de biopsia eliminada con éxito.');

        return redirect(route('biopsiesTypes.index'));
    }
}
