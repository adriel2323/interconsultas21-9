<?php

namespace App\Http\Controllers\Accounting;

use App\DataTables\Accounting\AccountingCheckDataTable;
use App\Http\Requests;
use App\Http\Requests\Accounting\checks\CreateAccountingCheckRequest;
use App\Http\Requests\Accounting\checks\UpdateAccountingCheckRequest;
use App\Models\Accounting\AccountingCheck;
use App\Models\Accounting\AccountingVendor;
use App\Models\Accounting\CheckPrintingParameters;
use App\Repositories\AccountingCheckRepository;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AccountingCheckController extends AppBaseController
{
    /** @var  AccountingCheckRepository */
    private $accountingCheckRepository;

    public function __construct(AccountingCheckRepository $accountingCheckRepo)
    {
        $this->accountingCheckRepository = $accountingCheckRepo;
    }

    /**
     * Display a listing of the AccountingCheck.
     *
     * @param AccountingCheckDataTable $accountingCheckDataTable
     * @return Response
     */
    public function index(AccountingCheckDataTable $accountingCheckDataTable)
    {
        return $accountingCheckDataTable->render('accounting.accounting_checks.index');
    }

    /**
     * Show the form for creating a new AccountingCheck.
     *
     * @return Response
     */
    public function create()
    {
        return view('accounting.accounting_checks.create');
    }

    /**
     * Store a newly created AccountingCheck in storage.
     *
     * @param CreateAccountingCheckRequest $request
     *
     * @return Response
     */
    public function store(CreateAccountingCheckRequest $request)
    {
        $input = $request->all();

        $input['emission_date'] = $this->formatDate($input['emission_date']);

        $input['expiration_date'] = $this->formatDate($input['expiration_date']);

        $accountingCheck = $this->accountingCheckRepository->create($input);

        Flash::success('Cheque almacenado con éxito.');

        return redirect(route('accountingChecks.create'));
    }

    /**
     * Display the specified AccountingCheck.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $accountingCheck = $this->accountingCheckRepository->findWithoutFail($id);

        if (empty($accountingCheck)) {
            Flash::error('Cheque no encontrado');

            return redirect(route('accountingChecks.index'));
        }

        return view('accounting.accounting_checks.show')->with('accountingCheck', $accountingCheck);
    }

    /**
     * Show the form for editing the specified AccountingCheck.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $accountingCheck = $this->accountingCheckRepository->findWithoutFail($id);

        if (empty($accountingCheck)) {
            Flash::error('Cheque no encontrado');

            return redirect(route('accountingChecks.index'));
        }

        return view('accounting.accounting_checks.edit')->with('accountingCheck', $accountingCheck);
    }

    /**
     * Update the specified AccountingCheck in storage.
     *
     * @param  int              $id
     * @param UpdateAccountingCheckRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAccountingCheckRequest $request)
    {
        $accountingCheck = $this->accountingCheckRepository->findWithoutFail($id);

        if (empty($accountingCheck)) {
            Flash::error('Cheque no encontrado');

            return redirect(route('accountingChecks.index'));
        }

        $accountingCheck = $this->accountingCheckRepository->update($request->all(), $id);

        Flash::success('Cheque actualizado con éxito.');

        return redirect(route('accountingChecks.index'));
    }

    /**
     * Remove the specified AccountingCheck from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $accountingCheck = $this->accountingCheckRepository->findWithoutFail($id);

        if (empty($accountingCheck)) {
            Flash::error('Cheque no encontrado');

            return redirect(route('accountingChecks.index'));
        }

        $this->accountingCheckRepository->delete($id);

        Flash::success('Cheque eliminado con éxito.');

        return redirect(route('accountingChecks.index'));
    }

    public function getVendorPayName($vendorId)
    {
        $vendor = AccountingVendor::find($vendorId);
        $payName = "";

        if(isset($vendor->pay_name)) {
            $payName = $vendor->pay_name;

        }
        return Response::json($payName, 200);
    }

    public function getLastCheckNumber($bankAccountId)
    {
        $lastCheck = AccountingCheck::where('accounting_bank_account', $bankAccountId)->latest()->first();
        $checkNumber = 1;

        if(!empty($lastCheck)) {
            $checkNumber = $lastCheck->check_number + 1;
        }

        return $checkNumber;
    }

    private function formatDate($value)
    {
        $date = \Carbon\Carbon::parse($value)->format('Y-m-d');
        $date .= "T";
        $date .= \Carbon\Carbon::parse($value)->format('H:i:s');
        return $date;
    }

    public function showPrintingRangesModal()
    {
        return view('accounting.accounting_checks.helpers.printingRangesModal');
    }

    public function checkPrintingConfirmation($bankAccountId, $fromCheckNumber, $toCheckNumber)
    {
        $lastCheck = AccountingCheck::where('accounting_bank_account', $bankAccountId)->latest()->first();
        $latestCheckNumber = 0;

        if(!empty($lastCheck)) {

            $latestCheckNumber = $lastCheck->check_number;

        }

        if($fromCheckNumber > $latestCheckNumber || $toCheckNumber > $latestCheckNumber)
        {
            Flash::error("El rango de cheques ingresados para el banco seleccionado es incorrecto. El último cheque emitido para el banco seleccionado es el número ". $latestCheckNumber);

            return redirect(route('accountingChecks.index'));
        }

        $checks = AccountingCheck::where('accounting_bank_account', $bankAccountId)->whereBetween('check_number', [$fromCheckNumber, $toCheckNumber])->orderBy('check_number', 'ASC')->get();

        $buttonLink = "/accounting/printChecks/{$bankAccountId}/{$fromCheckNumber}/{$toCheckNumber}";

        return view('accounting.accounting_checks.confirmPrinting')->with(['checks' => $checks, 'buttonLink' => $buttonLink]);
    }

    public function printChecks($bankAccountId, $fromCheckNumber, $toCheckNumber)
    {
        $checks = AccountingCheck::where('accounting_bank_account', $bankAccountId)->whereBetween('check_number', [$fromCheckNumber, $toCheckNumber])->orderBy('check_number', 'ASC')->get();

        $parameters = CheckPrintingParameters::all();

        $checkParameters = [
            'amountLeft' => $parameters[0]->left,
            'amountTop' => $parameters[0]->top,
            'emissionDateTop' => $parameters[1]->top,
            'emissionDateLeft' => $parameters[1]->left,
            'emissionYearTop' => $parameters[2]->top,
            'emissionYearLeft' => $parameters[2]->left,
            'expirationDayTop' => $parameters[3]->top,
            'expirationDayLeft' => $parameters[3]->left,
            'expirationMonthTop' => $parameters[4]->top,
            'expirationMonthLeft' => $parameters[4]->left,
            'expirationYearTop' => $parameters[5]->top,
            'expirationYearLeft' => $parameters[5]->left,
            'beneficiaryTop' => $parameters[6]->top,
            'beneficiaryLeft' => $parameters[6]->left,
            'amountLettersTop' => $parameters[7]->top,
            'amountLettersLeft' => $parameters[7]->left,
            ];

        $pdf = SnappyPdf::loadView('accounting.accounting_checks.printChecks', ['checks' => $checks, 'checkParameters' => $checkParameters]);

        $pdf->setOptions([
            'page-width' => '184mm',
            'page-height' => '75mm',
            'margin-top' => '0mm',
            'margin-right' => '0mm',
            'margin-bottom' => '0mm',
            'margin-left' => '0mm'
        ]);

        return $pdf->inline('checks.pdf');
    }
}
