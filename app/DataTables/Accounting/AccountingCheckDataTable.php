<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountingCheck;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AccountingCheckDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'accounting.accounting_checks.datatables_actions')
                         ->editColumn('accounting_bank_account', function (AccountingCheck $row) {
                             return $row->bankAccount->name;
                         })
                         ->editColumn('accounting_vendor_id', function (AccountingCheck $row) {
                             return $row->vendor->fantasy_name;
                         })
                         ->editColumn('created_by', function (AccountingCheck $row) {
                             return $row->creator->name;
                         })
                         ->editColumn('emission_date', function (AccountingCheck $row) {
                             return Carbon::parse($row->emission_date)->format('d/m/Y');
                         })
                         ->editColumn('amount', function (AccountingCheck $row) {
                             return number_format($row->amount, 2, ',', '.');
                         })
                         ->editColumn('expiration_date', function (AccountingCheck $row) {
                             return Carbon::parse($row->expiration_date)->format('d/m/Y');
                         });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountingCheck $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountingCheck $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => [],
                'language' => ['url' => '/css/datatables/spanish.json'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'accounting_bank_account',
                'data' => 'accounting_bank_account',
                'title' => 'Cuenta Bancaria'
            ],
            [
                'name' => 'check_number',
                'data' => 'check_number',
                'title' => 'Número de cheque'
            ],
            [
                'name' => 'accounting_vendor_id',
                'data' => 'accounting_vendor_id',
                'title' => 'Proveedor'
            ],
            [
                'name' => 'emission_date',
                'data' => 'emission_date',
                'title' => 'Fecha de emisión'
            ],
            [
                'name' => 'expiration_date',
                'data' => 'expiration_date',
                'title' => 'Fecha de expiración'
            ],
            [
                'name' => 'amount',
                'data' => 'amount',
                'title' => 'Monto'
            ],
            [
                'name' => 'created_by',
                'data' => 'created_by',
                'title' => 'Emitido por:'
            ]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'accounting_checksdatatable_' . time();
    }
}
