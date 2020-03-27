<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountingBank;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AccountingBankDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'accounting.accounting_banks.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param App\Models\Accounting\AccountingBank $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountingBank $model)
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
                'name' => 'name',
                'data' => 'name',
                'title' => 'Nombre'
            ],
            [
                'name' => 'account_number',
                'data' => 'account_number',
                'title' => 'Nro. de Cuenta'
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
        return 'accounting_banksdatatable_' . time();
    }
}
