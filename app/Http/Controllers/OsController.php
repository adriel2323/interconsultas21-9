<?php

namespace App\Http\Controllers;

use App\DataTables\OsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOsRequest;
use App\Http\Requests\UpdateOsRequest;
use App\Repositories\OsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OsController extends AppBaseController
{
    /** @var  OsRepository */
    private $osRepository;

    public function __construct(OsRepository $osRepo)
    {
        $this->osRepository = $osRepo;
    }

    /**
     * Display a listing of the Os.
     *
     * @param OsDataTable $osDataTable
     * @return Response
     */
    public function index(OsDataTable $osDataTable)
    {
        return $osDataTable->render('os.index');
    }

    /**
     * Show the form for creating a new Os.
     *
     * @return Response
     */
    public function create()
    {
        return view('os.create');
    }

    /**
     * Store a newly created Os in storage.
     *
     * @param CreateOsRequest $request
     *
     * @return Response
     */
    public function store(CreateOsRequest $request)
    {
        $input = $request->all();

        $os = $this->osRepository->create($input);

        Flash::success('Obra Social almacenada correctamente.');

        return redirect(route('os.index'));
    }

    /**
     * Display the specified Os.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $os = $this->osRepository->findWithoutFail($id);

        if (empty($os)) {
            Flash::error('Obra Social no encontrada.');

            return redirect(route('os.index'));
        }

        return view('os.show')->with('os', $os);
    }

    /**
     * Show the form for editing the specified Os.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $os = $this->osRepository->findWithoutFail($id);

        if (empty($os)) {
            Flash::error('Obra Social no encontrada.');

            return redirect(route('os.index'));
        }

        return view('os.edit')->with('os', $os);
    }

    /**
     * Update the specified Os in storage.
     *
     * @param  int              $id
     * @param UpdateOsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOsRequest $request)
    {
        $os = $this->osRepository->findWithoutFail($id);

        if (empty($os)) {
            Flash::error('Obra Social no encontrada.');

            return redirect(route('os.index'));
        }

        $os = $this->osRepository->update($request->all(), $id);

        Flash::success('Obra Social actualizada correctamente.');

        return redirect(route('os.index'));
    }

    /**
     * Remove the specified Os from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $os = $this->osRepository->findWithoutFail($id);

        if (empty($os)) {
            Flash::error('Obra Social no encontrada.');

            return redirect(route('os.index'));
        }

        $this->osRepository->delete($id);

        Flash::success('Obra Social eliminada con éxito.');

        return redirect(route('os.index'));
    }
}
