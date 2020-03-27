<?php

namespace App\Http\Controllers\Surgerytypes;

use App\DataTables\Surgerytypes\SurgeryTypeDataTable;
use App\Http\Requests\Surgerytypes;
use App\Http\Requests\Surgerytypes\CreateSurgeryTypeRequest;
use App\Http\Requests\Surgerytypes\UpdateSurgeryTypeRequest;
use App\Repositories\Surgerytypes\SurgeryTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SurgeryTypeController extends AppBaseController
{
    /** @var  SurgeryTypeRepository */
    private $surgeryTypeRepository;

    public function __construct(SurgeryTypeRepository $surgeryTypeRepo)
    {
        $this->surgeryTypeRepository = $surgeryTypeRepo;
    }

    /**
     * Display a listing of the SurgeryType.
     *
     * @param SurgeryTypeDataTable $surgeryTypeDataTable
     * @return Response
     */
    public function index(SurgeryTypeDataTable $surgeryTypeDataTable)
    {
        return $surgeryTypeDataTable->render('surgeryTypes.index');
    }

    /**
     * Show the form for creating a new SurgeryType.
     *
     * @return Response
     */
    public function create()
    {
        return view('surgeryTypes.create');
    }

    /**
     * Store a newly created SurgeryType in storage.
     *
     * @param CreateSurgeryTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateSurgeryTypeRequest $request)
    {
        $input = $request->all();

        $surgeryType = $this->surgeryTypeRepository->create($input);

        Flash::success('Tipo de Cirugía almacenada con éxito.');

        return redirect(route('surgeryTypes.index'));
    }

    /**
     * Display the specified SurgeryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $surgeryType = $this->surgeryTypeRepository->findWithoutFail($id);

        if (empty($surgeryType)) {
            Flash::error('Tipo de cirugía no encontrada.');

            return redirect(route('surgeryTypes.index'));
        }

        return view('surgeryTypes.show')->with('surgeryType', $surgeryType);
    }

    /**
     * Show the form for editing the specified SurgeryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $surgeryType = $this->surgeryTypeRepository->findWithoutFail($id);

        if (empty($surgeryType)) {
            Flash::error('Tipo de cirugía no encontrada.');

            return redirect(route('surgeryTypes.index'));
        }

        return view('surgeryTypes.edit')->with('surgeryType', $surgeryType);
    }

    /**
     * Update the specified SurgeryType in storage.
     *
     * @param  int              $id
     * @param UpdateSurgeryTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSurgeryTypeRequest $request)
    {
        $surgeryType = $this->surgeryTypeRepository->findWithoutFail($id);

        if (empty($surgeryType)) {
            Flash::error('Tipo de cirugía no encontrada.');

            return redirect(route('surgeryTypes.index'));
        }

        $surgeryType = $this->surgeryTypeRepository->update($request->all(), $id);

        Flash::success('Tipo de cirugía actualizada con éxito.');

        return redirect(route('surgeryTypes.index'));
    }

    /**
     * Remove the specified SurgeryType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $surgeryType = $this->surgeryTypeRepository->findWithoutFail($id);

        if (empty($surgeryType)) {
            Flash::error('Tipo de cirugía no encontrada.');

            return redirect(route('surgeryTypes.index'));
        }

        $this->surgeryTypeRepository->delete($id);

        Flash::success('Tipo de cirugía eliminada con éxito.');

        return redirect(route('surgeryTypes.index'));
    }
}
