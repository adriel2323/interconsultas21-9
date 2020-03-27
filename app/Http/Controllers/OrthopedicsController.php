<?php

namespace App\Http\Controllers;

use App\DataTables\OrthopedicsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrthopedicsRequest;
use App\Http\Requests\UpdateOrthopedicsRequest;
use App\Repositories\OrthopedicsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrthopedicsController extends AppBaseController
{
    /** @var  OrthopedicsRepository */
    private $orthopedicsRepository;

    public function __construct(OrthopedicsRepository $orthopedicsRepo)
    {
        $this->orthopedicsRepository = $orthopedicsRepo;
    }

    /**
     * Display a listing of the Orthopedics.
     *
     * @param OrthopedicsDataTable $orthopedicsDataTable
     * @return Response
     */
    public function index(OrthopedicsDataTable $orthopedicsDataTable)
    {
        return $orthopedicsDataTable->render('orthopedics.index');
    }

    /**
     * Show the form for creating a new Orthopedics.
     *
     * @return Response
     */
    public function create()
    {
        return view('orthopedics.create');
    }

    /**
     * Store a newly created Orthopedics in storage.
     *
     * @param CreateOrthopedicsRequest $request
     *
     * @return Response
     */
    public function store(CreateOrthopedicsRequest $request)
    {
        $input = $request->all();

        $orthopedics = $this->orthopedicsRepository->create($input);

        Flash::success('Ortopedia almacenada con éxito.');

        return redirect(route('orthopedics.index'));
    }

    /**
     * Display the specified Orthopedics.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orthopedics = $this->orthopedicsRepository->findWithoutFail($id);

        if (empty($orthopedics)) {
            Flash::error('Ortopedia no encontrada');

            return redirect(route('orthopedics.index'));
        }

        return view('orthopedics.show')->with('orthopedics', $orthopedics);
    }

    /**
     * Show the form for editing the specified Orthopedics.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orthopedics = $this->orthopedicsRepository->findWithoutFail($id);

        if (empty($orthopedics)) {
            Flash::error('Ortopedia no encontrada');

            return redirect(route('orthopedics.index'));
        }

        return view('orthopedics.edit')->with('orthopedics', $orthopedics);
    }

    /**
     * Update the specified Orthopedics in storage.
     *
     * @param  int              $id
     * @param UpdateOrthopedicsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrthopedicsRequest $request)
    {
        $orthopedics = $this->orthopedicsRepository->findWithoutFail($id);

        if (empty($orthopedics)) {
            Flash::error('Ortopedia no encontrada');

            return redirect(route('orthopedics.index'));
        }

        $orthopedics = $this->orthopedicsRepository->update($request->all(), $id);

        Flash::success('Ortopedia actualizada con éxito.');

        return redirect(route('orthopedics.index'));
    }

    /**
     * Remove the specified Orthopedics from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orthopedics = $this->orthopedicsRepository->findWithoutFail($id);

        if (empty($orthopedics)) {
            Flash::error('Ortopedia no encontrada');

            return redirect(route('orthopedics.index'));
        }

        $this->orthopedicsRepository->delete($id);

        Flash::success('Ortopedia eliminada con éxito.');

        return redirect(route('orthopedics.index'));
    }
}
