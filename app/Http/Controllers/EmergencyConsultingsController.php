<?php

namespace App\Http\Controllers;

use App\DataTables\EmergencyConsultingsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateEmergencyConsultingsRequest;
use App\Http\Requests\UpdateEmergencyConsultingsRequest;
use App\Repositories\EmergencyConsultingsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Connectors\Connector;
use Response;
use Auth;

class EmergencyConsultingsController extends AppBaseController
{
    /** @var  EmergencyConsultingsRepository */
    private $emergencyConsultingsRepository;

    public function __construct(EmergencyConsultingsRepository $emergencyConsultingsRepo)
    {
        $this->emergencyConsultingsRepository = $emergencyConsultingsRepo;
    }

    /**
     * Display a listing of the EmergencyConsultings.
     *
     * @param EmergencyConsultingsDataTable $emergencyConsultingsDataTable
     * @return Response
     */
    public function index(EmergencyConsultingsDataTable $emergencyConsultingsDataTable)
    {
        if(Auth::user()->can('emergencyConsultings.view')) {

            return $emergencyConsultingsDataTable->render('emergency_consultings.index');

        } else {
            Flash::error("Usted no tiene permiso para acceder a la sección elegida.");
            return redirect('/home');
        }

    }

    /**
     * Show the form for creating a new EmergencyConsultings.
     *
     * @return Response
     */
    public function create()
    {
        return view('emergency_consultings.create');
    }

    /**
     * Store a newly created EmergencyConsultings in storage.
     *
     * @param CreateEmergencyConsultingsRequest $request
     *
     * @return Response
     */
    public function store(CreateEmergencyConsultingsRequest $request)
    {
        $input = $request->all();
        $emergencyConsultings = $this->emergencyConsultingsRepository->create($input);

        Flash::success('Consulta de guardia almacenada correctamente.');

        return redirect(route('emergencyConsultings.index'));
    }

    /**
     * Display the specified EmergencyConsultings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emergencyConsultings = $this->emergencyConsultingsRepository->findWithoutFail($id);

        if (empty($emergencyConsultings)) {
            Flash::error('Consulta de guardia no encontrada.');

            return redirect(route('emergencyConsultings.index'));
        }

        return view('emergency_consultings.show')->with('emergencyConsultings', $emergencyConsultings);
    }

    /**
     * Show the form for editing the specified EmergencyConsultings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emergencyConsultings = $this->emergencyConsultingsRepository->findWithoutFail($id);

        if (empty($emergencyConsultings)) {
            Flash::error('Consulta de guardia no encontrada.');

            return redirect(route('emergencyConsultings.index'));
        }

        return view('emergency_consultings.edit')->with('emergencyConsultings', $emergencyConsultings);
    }

    /**
     * Update the specified EmergencyConsultings in storage.
     *
     * @param  int              $id
     * @param UpdateEmergencyConsultingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmergencyConsultingsRequest $request)
    {
        $emergencyConsultings = $this->emergencyConsultingsRepository->findWithoutFail($id);

        if (empty($emergencyConsultings)) {
            Flash::error('Consulta de guardia no encontrada.');

            return redirect(route('emergencyConsultings.index'));
        }
        $input = $request->all();

        $emergencyConsultings = $this->emergencyConsultingsRepository->update($input, $id);

        Flash::success('Consulta de guardia actualizada correctamente.');

        return redirect(route('emergencyConsultings.index'));
    }

    /**
     * Remove the specified EmergencyConsultings from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emergencyConsultings = $this->emergencyConsultingsRepository->findWithoutFail($id);

        if (empty($emergencyConsultings)) {
            Flash::error('Consulta de guardia no encontrada.');

            return redirect(route('emergencyConsultings.index'));
        }

        $this->emergencyConsultingsRepository->delete($id);

        Flash::success('Consulta de guardia eliminada con éxito.');

        return redirect(route('emergencyConsultings.index'));
    }
}
