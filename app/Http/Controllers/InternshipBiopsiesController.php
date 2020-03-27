<?php

namespace App\Http\Controllers;

use App\DataTables\InternshipBiopsiesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInternshipBiopsiesRequest;
use App\Http\Requests\UpdateInternshipBiopsiesRequest;
use App\Models\InternshipBiopsies;
use App\Repositories\InternshipBiopsiesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InternshipBiopsiesController extends AppBaseController
{
    /** @var  InternshipBiopsiesRepository */
    private $internshipBiopsiesRepository;

    public function __construct(InternshipBiopsiesRepository $internshipBiopsiesRepo)
    {
        $this->internshipBiopsiesRepository = $internshipBiopsiesRepo;
    }

    /**
     * Display a listing of the InternshipBiopsies.
     *
     * @param InternshipBiopsiesDataTable $internshipBiopsiesDataTable
     * @return Response
     */
    public function index(InternshipBiopsiesDataTable $internshipBiopsiesDataTable)
    {
        return $internshipBiopsiesDataTable->render('internship_biopsies.index');
    }

    /**
     * Show the form for creating a new InternshipBiopsies.
     *
     * @return Response
     */
    public function create()
    {
        return view('internship_biopsies.create');
    }

    /**
     * Store a newly created InternshipBiopsies in storage.
     *
     * @param CreateInternshipBiopsiesRequest $request
     *
     * @return Response
     */
    public function store(CreateInternshipBiopsiesRequest $request)
    {
        $input = $request->all();

        $internshipBiopsies = $this->internshipBiopsiesRepository->create($input);

        Flash::success('Biopsia almacenada correctamente.');

        return redirect(route('internshipBiopsies.index'));
    }

    /**
     * Display the specified InternshipBiopsies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $internshipBiopsies = $this->internshipBiopsiesRepository->findWithoutFail($id);

        if (empty($internshipBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('internshipBiopsies.index'));
        }

        return view('internship_biopsies.show')->with('internshipBiopsies', $internshipBiopsies);
    }

    /**
     * Show the form for editing the specified InternshipBiopsies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $internshipBiopsies = $this->internshipBiopsiesRepository->findWithoutFail($id);

        if (empty($internshipBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('internshipBiopsies.index'));
        }

        return view('internship_biopsies.edit')->with('internshipBiopsies', $internshipBiopsies);
    }

    /**
     * Update the specified InternshipBiopsies in storage.
     *
     * @param  int              $id
     * @param UpdateInternshipBiopsiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInternshipBiopsiesRequest $request)
    {
        $internshipBiopsies = $this->internshipBiopsiesRepository->findWithoutFail($id);

        if (empty($internshipBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('internshipBiopsies.index'));
        }

        $internshipBiopsies = $this->internshipBiopsiesRepository->update($request->all(), $id);

        Flash::success('Biopsia actualizada correctamente.');

        return redirect(route('internshipBiopsies.index'));
    }

    /**
     * Remove the specified InternshipBiopsies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $internshipBiopsies = $this->internshipBiopsiesRepository->findWithoutFail($id);

        if (empty($internshipBiopsies)) {
            Flash::error('Biopsia no encontrada.');

            return redirect(route('internshipBiopsies.index'));
        }

        $this->internshipBiopsiesRepository->delete($id);

        Flash::success('Biopsia eliminada con éxito.');

        return redirect(route('internshipBiopsies.index'));
    }
}
