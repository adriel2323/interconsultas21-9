<?php

namespace App\Http\Controllers;

use App\DataTables\InterconsultingDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInterconsultingRequest;
use App\Http\Requests\UpdateInterconsultingRequest;
use App\Mail\interconsultings\CancelInterconsulting;
use App\Mail\interconsultings\CreateInterconsult;
use App\Models\Doctor;
use App\Models\Interconsulting;
use App\Notifications\Interconsults\InterconsultCreatedViaWhatsapp;
use App\Repositories\InterconsultingRepository;
use Facades\App\Services\InterconsultingService;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Telegram\Bot\Laravel\Facades\Telegram;

class InterconsultingController extends AppBaseController
{
    /** @var  InterconsultingRepository */
    private $interconsultingRepository;

    public function __construct(InterconsultingRepository $interconsultingRepo)
    {
        $this->interconsultingRepository = $interconsultingRepo;
    }

    /**
     * Display a listing of the Interconsulting.
     *
     * @param InterconsultingDataTable $interconsultingDataTable
     * @return Response
     */
    public function index(InterconsultingDataTable $interconsultingDataTable)
    {
        return $interconsultingDataTable->render('interconsultings.index');
    }

    /**
     * Show the form for creating a new Interconsulting.
     *
     * @return Response
     */
    public function create()
    {
        return view('interconsultings.create');
    }

    /**
     * Store a newly created Interconsulting in storage.
     *
     * @param CreateInterconsultingRequest $request
     *
     * @return Response
     */
    public function store(CreateInterconsultingRequest $request)
    {
        $input = $request->all();

        $input['status_id'] = 1;

        $interconsulting = $this->interconsultingRepository->create($input);

        $interconsulting = Interconsulting::find($interconsulting->id);

        InterconsultingService::sendStoreNotification($interconsulting);

        Flash::success('Interconsulta almacenada correctamente.');

        return redirect(route('interconsultings.index'));
    }

    /**
     * Display the specified Interconsulting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $interconsulting = $this->interconsultingRepository->findWithoutFail($id);

        if (empty($interconsulting)) {
            Flash::error('Interconsulta no encontrada.');

            return redirect(route('interconsultings.index'));
        }

        return view('interconsultings.show')->with('interconsulting', $interconsulting);
    }

    /**
     * Show the form for editing the specified Interconsulting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $interconsulting = $this->interconsultingRepository->findWithoutFail($id);

        if (empty($interconsulting)) {
            Flash::error('Interconsulta no encontrada.');

            return redirect(route('interconsultings.index'));
        }

        return view('interconsultings.edit')->with('interconsulting', $interconsulting);
    }

    /**
     * Update the specified Interconsulting in storage.
     *
     * @param  int              $id
     * @param UpdateInterconsultingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInterconsultingRequest $request)
    {
        $interconsulting = $this->interconsultingRepository->findWithoutFail($id);

        if (empty($interconsulting)) {
            Flash::error('Interconsulta no encontrada.');

            return redirect(route('interconsultings.index'));
        }

        $interconsulting = $this->interconsultingRepository->update($request->all(), $id);

        Flash::success('Interconsulta actualizada correctamente.');

        return redirect(route('interconsultings.index'));
    }

    /**
     * Remove the specified Interconsulting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $interconsulting = $this->interconsultingRepository->findWithoutFail($id);

        if (empty($interconsulting)) {
            Flash::error('Interconsulta no encontrada.');

            return redirect(route('interconsultings.index'));
        }

        $this->interconsultingRepository->delete($id);

        Flash::success('Interconsulta eliminada con éxito.');

        return redirect(route('interconsultings.index'));
    }

    public function setStatus($interconsultingId, $statusId)
    {
        Interconsulting::where('id', $interconsultingId)->update([
           'status_id' => $statusId
        ]);

        if($statusId == 4) {
            $interconsulting = Interconsulting::find($interconsultingId);

            InterconsultingService::sendCancelledInterconsultingNotification($interconsulting);
        }

        Flash::success('Éxito al cambiar el estado de la consulta.');

        return redirect(route('interconsultings.index'));
    }

    public function fullScreen()
    {
        $interconsultings = Interconsulting::where('status_id',1)->simplePaginate(10);
        return view('interconsultings.fullScreenTable')->with(['interconsultings' => $interconsultings]);
    }

    public function setViewedStatus($interconsultingId)
    {
        $interconsulting = $this->interconsultingRepository->findWithoutFail($interconsultingId);

        if (empty($interconsulting)) {
            Flash::error('Interconsulta no encontrada.');

            return redirect(url('/login'));
        }

        if($interconsulting->status_id == 1) {
            Interconsulting::where('id', $interconsultingId)->update([
                'status_id' => 2
            ]);

            Flash::success('Interconsulta marcada como vista.');
        } else {
            Flash::error('La interconsulta no puede cambiar de estado porque ha sido marcado como finalizada.');
        }

        return view('auth.login');

    }

    public function pendings()
    {
        return view('interconsultings.pending');
    }

    public function pendingsQuery($doctorID)
    {
//        $interconsultings = Interconsulting::where('requested_doctor_id', $doctorID)
//                                            ->where('status_id', 1 )
//                                            ->where('room_id', 92)
//                                            ->orWhere('room_id', 93)
//                                            ->get();

        $interconsultings = Interconsulting::where(function ($query) use ($doctorID) {
                                                    $query->where('requested_doctor_id', $doctorID)
                                                          ->where('status_id',1)
                                                          ->where('room_id', 92);
                                            })
                                            ->orWhere(function ($query) use ($doctorID) {
                                                    $query->where('requested_doctor_id', $doctorID)
                                                          ->where('status_id',1)
                                                          ->where('room_id', 93);
                                            })
                                            ->orWhere(function ($query) use ($doctorID) {
                                                $query->where('requested_doctor_id', $doctorID)
                                                    ->where('status_id',2)
                                                    ->where('room_id', 92);
                                            })
                                            ->orWhere(function ($query) use ($doctorID) {
                                                $query->where('requested_doctor_id', $doctorID)
                                                    ->where('status_id',2)
                                                    ->where('room_id', 93);
                                            })
                                            ->get();

        return view('interconsultings.pendingQuery')->with(['interconsultings' => $interconsultings])->render();
    }
}
