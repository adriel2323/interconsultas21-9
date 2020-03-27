<?php

namespace App\Http\Controllers;

use App\DataTables\ConsultingRoomBiopsiesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateConsultingRoomBiopsiesRequest;
use App\Http\Requests\UpdateConsultingRoomBiopsiesRequest;
use App\Repositories\ConsultingRoomBiopsiesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ConsultingRoomBiopsiesController extends AppBaseController
{
    /** @var  ConsultingRoomBiopsiesRepository */
    private $consultingRoomBiopsiesRepository;

    public function __construct(ConsultingRoomBiopsiesRepository $consultingRoomBiopsiesRepo)
    {
        $this->consultingRoomBiopsiesRepository = $consultingRoomBiopsiesRepo;
    }

    /**
     * Display a listing of the ConsultingRoomBiopsies.
     *
     * @param ConsultingRoomBiopsiesDataTable $consultingRoomBiopsiesDataTable
     * @return Response
     */
    public function index(ConsultingRoomBiopsiesDataTable $consultingRoomBiopsiesDataTable)
    {
        return $consultingRoomBiopsiesDataTable->render('consulting_room_biopsies.index');
    }

    /**
     * Show the form for creating a new ConsultingRoomBiopsies.
     *
     * @return Response
     */
    public function create()
    {
        return view('consulting_room_biopsies.create');
    }

    /**
     * Store a newly created ConsultingRoomBiopsies in storage.
     *
     * @param CreateConsultingRoomBiopsiesRequest $request
     *
     * @return Response
     */
    public function store(CreateConsultingRoomBiopsiesRequest $request)
    {
        $input = $request->all();

        $consultingRoomBiopsies = $this->consultingRoomBiopsiesRepository->create($input);

        Flash::success('Biopsia almacenada correctamente.');

        return redirect(route('consultingRoomBiopsies.index'));
    }

    /**
     * Display the specified ConsultingRoomBiopsies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consultingRoomBiopsies = $this->consultingRoomBiopsiesRepository->findWithoutFail($id);

        if (empty($consultingRoomBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('consultingRoomBiopsies.index'));
        }

        return view('consulting_room_biopsies.show')->with('consultingRoomBiopsies', $consultingRoomBiopsies);
    }

    /**
     * Show the form for editing the specified ConsultingRoomBiopsies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consultingRoomBiopsies = $this->consultingRoomBiopsiesRepository->findWithoutFail($id);

        if (empty($consultingRoomBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('consultingRoomBiopsies.index'));
        }

        return view('consulting_room_biopsies.edit')->with('consultingRoomBiopsies', $consultingRoomBiopsies);
    }

    /**
     * Update the specified ConsultingRoomBiopsies in storage.
     *
     * @param  int              $id
     * @param UpdateConsultingRoomBiopsiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsultingRoomBiopsiesRequest $request)
    {
        $consultingRoomBiopsies = $this->consultingRoomBiopsiesRepository->findWithoutFail($id);

        if (empty($consultingRoomBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('consultingRoomBiopsies.index'));
        }

        $consultingRoomBiopsies = $this->consultingRoomBiopsiesRepository->update($request->all(), $id);

        Flash::success('Biopsia actualizada correctamente.');

        return redirect(route('consultingRoomBiopsies.index'));
    }

    /**
     * Remove the specified ConsultingRoomBiopsies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consultingRoomBiopsies = $this->consultingRoomBiopsiesRepository->findWithoutFail($id);

        if (empty($consultingRoomBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('consultingRoomBiopsies.index'));
        }

        $this->consultingRoomBiopsiesRepository->delete($id);

        Flash::success('Biopsia eliminada con éxito.');

        return redirect(route('consultingRoomBiopsies.index'));
    }
}
