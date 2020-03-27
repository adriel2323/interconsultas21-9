<?php

namespace App\Http\Controllers;

use App\DataTables\insuranceCompaniesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateinsuranceCompaniesRequest;
use App\Http\Requests\UpdateinsuranceCompaniesRequest;
use App\Repositories\insuranceCompaniesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class insuranceCompaniesController extends AppBaseController
{
    /** @var  insuranceCompaniesRepository */
    private $insuranceCompaniesRepository;

    public function __construct(insuranceCompaniesRepository $insuranceCompaniesRepo)
    {
        $this->insuranceCompaniesRepository = $insuranceCompaniesRepo;
    }

    /**
     * Display a listing of the insuranceCompanies.
     *
     * @param insuranceCompaniesDataTable $insuranceCompaniesDataTable
     * @return Response
     */
    public function index(insuranceCompaniesDataTable $insuranceCompaniesDataTable)
    {
        return $insuranceCompaniesDataTable->render('insurance_companies.index');
    }

    /**
     * Show the form for creating a new insuranceCompanies.
     *
     * @return Response
     */
    public function create()
    {
        return view('insurance_companies.create');
    }

    /**
     * Store a newly created insuranceCompanies in storage.
     *
     * @param CreateinsuranceCompaniesRequest $request
     *
     * @return Response
     */
    public function store(CreateinsuranceCompaniesRequest $request)
    {
        $input = $request->all();

        $input['name'] = strtoupper($input['name']);
        $input['address'] = strtoupper($input['address']);

        $insuranceCompanies = $this->insuranceCompaniesRepository->create($input);

        Flash::success('Companía de ART almacenada con éxito.');

        return redirect(route('insuranceCompanies.index'));
    }

    /**
     * Display the specified insuranceCompanies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $insuranceCompanies = $this->insuranceCompaniesRepository->findWithoutFail($id);

        if (empty($insuranceCompanies)) {
            Flash::error('Companía de ART no encontrada');

            return redirect(route('insuranceCompanies.index'));
        }

        return view('insurance_companies.show')->with('insuranceCompanies', $insuranceCompanies);
    }

    /**
     * Show the form for editing the specified insuranceCompanies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $insuranceCompanies = $this->insuranceCompaniesRepository->findWithoutFail($id);

        if (empty($insuranceCompanies)) {
            Flash::error('Companía de ART no encontrada');

            return redirect(route('insuranceCompanies.index'));
        }

        return view('insurance_companies.edit')->with('insuranceCompanies', $insuranceCompanies);
    }

    /**
     * Update the specified insuranceCompanies in storage.
     *
     * @param  int              $id
     * @param UpdateinsuranceCompaniesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinsuranceCompaniesRequest $request)
    {
        $insuranceCompanies = $this->insuranceCompaniesRepository->findWithoutFail($id);

        if (empty($insuranceCompanies)) {
            Flash::error('Companía de ART no encontrada');

            return redirect(route('insuranceCompanies.index'));
        }

        $input = $request->all();
        $input['name'] = strtoupper($input['name']);
        $input['address'] = strtoupper($input['address']);

        $insuranceCompanies = $this->insuranceCompaniesRepository->update($input, $id);

        Flash::success('Companía de ART actualizada con éxito.');

        return redirect(route('insuranceCompanies.index'));
    }

    /**
     * Remove the specified insuranceCompanies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $insuranceCompanies = $this->insuranceCompaniesRepository->findWithoutFail($id);

        if (empty($insuranceCompanies)) {
            Flash::error('Companía de ART no encontrada');

            return redirect(route('insuranceCompanies.index'));
        }

        $this->insuranceCompaniesRepository->delete($id);

        Flash::success('Companía de ART eliminada con éxito.');

        return redirect(route('insuranceCompanies.index'));
    }
}
