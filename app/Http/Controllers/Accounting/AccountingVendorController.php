<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountingVendorDataTable;
use App\Http\Requests;
use App\Http\Requests\Accounting\vendors\CreateAccountingVendorRequest;
use App\Http\Requests\Accounting\vendors\UpdateAccountingVendorRequest;
use App\Repositories\AccountingVendorRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountingVendorController extends AppBaseController
{
    /** @var  AccountingVendorRepository */
    private $accountingVendorRepository;

    public function __construct(AccountingVendorRepository $accountingVendorRepo)
    {
        $this->accountingVendorRepository = $accountingVendorRepo;
    }

    /**
     * Display a listing of the AccountingVendor.
     *
     * @param AccountingVendorDataTable $accountingVendorDataTable
     * @return Response
     */
    public function index(AccountingVendorDataTable $accountingVendorDataTable)
    {
        return $accountingVendorDataTable->render('accounting.accounting_vendors.index');
    }

    /**
     * Show the form for creating a new AccountingVendor.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.accounting_vendors.create');
    }

    /**
     * Store a newly created AccountingVendor in storage.
     *
     * @param CreateAccountingVendorRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountingVendorRequest $request)
    {
        $input = $request->all();

        $accountingVendor = $this->accountingVendorRepository->create($input);

        Flash::success('Proveedor almacenado con éxito.');

        return redirect(route('accountingVendors.index'));
    }

    /**
     * Display the specified AccountingVendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountingVendor = $this->accountingVendorRepository->findWithoutFail($id);

        if (empty($accountingVendor)) {
            Flash::error('Proveedor no encontrado');

            return redirect(route('accountingVendors.index'));
        }

        return view('accounting.accounting_vendors.show')->with('accountingVendor', $accountingVendor);
    }

    /**
     * Show the form for editing the specified AccountingVendor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountingVendor = $this->accountingVendorRepository->findWithoutFail($id);

        if (empty($accountingVendor)) {
            Flash::error('Proveedor no encontrado');

            return redirect(route('accountingVendors.index'));
        }

        return view('accounting.accounting_vendors.edit')->with('accountingVendor', $accountingVendor);
    }

    /**
     * Update the specified AccountingVendor in storage.
     *
     * @param  int              $id
     * @param UpdateAccountingVendorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountingVendorRequest $request)
    {
        $accountingVendor = $this->accountingVendorRepository->findWithoutFail($id);

        if (empty($accountingVendor)) {
            Flash::error('Proveedor no encontrado');

            return redirect(route('accountingVendors.index'));
        }

        $accountingVendor = $this->accountingVendorRepository->update($request->all(), $id);

        Flash::success('Proveedor actualizado con éxito.');

        return redirect(route('accountingVendors.index'));
    }

    /**
     * Remove the specified AccountingVendor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountingVendor = $this->accountingVendorRepository->findWithoutFail($id);

        if (empty($accountingVendor)) {
            Flash::error('Proveedor no encontrado');

            return redirect(route('accountingVendors.index'));
        }

        $this->accountingVendorRepository->delete($id);

        Flash::success('Proveedor eliminado con éxito.');

        return redirect(route('accountingVendors.index'));
    }
}
