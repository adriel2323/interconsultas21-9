<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountingBankDataTable;
use App\Http\Requests;
use App\Http\Requests\Accounting\bankAccounts\CreateAccountingBankRequest;
use App\Http\Requests\Accounting\bankAccounts\UpdateAccountingBankRequest;
use App\Repositories\AccountingBankRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountingBankController extends AppBaseController
{
    /** @var  AccountingBankRepository */
    private $accountingBankRepository;

    public function __construct(AccountingBankRepository $accountingBankRepo)
    {
        $this->accountingBankRepository = $accountingBankRepo;
    }

    /**
     * Display a listing of the AccountingBank.
     *
     * @param AccountingBankDataTable $accountingBankDataTable
     * @return Response
     */
    public function index(AccountingBankDataTable $accountingBankDataTable)
    {
        return $accountingBankDataTable->render('accounting.accounting_banks.index');
    }

    /**
     * Show the form for creating a new AccountingBank.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.accounting_banks.create');
    }

    /**
     * Store a newly created AccountingBank in storage.
     *
     * @param CreateAccountingBankRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountingBankRequest $request)
    {
        $input = $request->all();

        $accountingBank = $this->accountingBankRepository->create($input);

        Flash::success('Cuenta Bancaria almacenada con éxito.');

        return redirect(route('accountingBanks.index'));
    }

    /**
     * Display the specified AccountingBank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountingBank = $this->accountingBankRepository->findWithoutFail($id);

        if (empty($accountingBank)) {
            Flash::error('Cuenta Bancaria no encontrada');

            return redirect(route('accountingBanks.index'));
        }

        return view('accounting.accounting_banks.show')->with('accountingBank', $accountingBank);
    }

    /**
     * Show the form for editing the specified AccountingBank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountingBank = $this->accountingBankRepository->findWithoutFail($id);

        if (empty($accountingBank)) {
            Flash::error('Cuenta Bancaria no encontrada');

            return redirect(route('accountingBanks.index'));
        }

        return view('accounting.accounting_banks.edit')->with('accountingBank', $accountingBank);
    }

    /**
     * Update the specified AccountingBank in storage.
     *
     * @param  int              $id
     * @param UpdateAccountingBankRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountingBankRequest $request)
    {
        $accountingBank = $this->accountingBankRepository->findWithoutFail($id);

        if (empty($accountingBank)) {
            Flash::error('Cuenta Bancaria no encontrada');

            return redirect(route('accountingBanks.index'));
        }

        $accountingBank = $this->accountingBankRepository->update($request->all(), $id);

        Flash::success('Cuenta Bancaria actualizada con éxito.');

        return redirect(route('accountingBanks.index'));
    }

    /**
     * Remove the specified AccountingBank from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountingBank = $this->accountingBankRepository->findWithoutFail($id);

        if (empty($accountingBank)) {
            Flash::error('Accounting Bank no encontrado');

            return redirect(route('accountingBanks.index'));
        }

        $this->accountingBankRepository->delete($id);

        Flash::success('Cuenta Bancaria eliminada con éxito.');

        return redirect(route('accountingBanks.index'));
    }
}
