<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\AccountingVendor;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AccountingVendorDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'accounting.accounting_vendors.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccountingVendor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccountingVendor $model)
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
                'order'   => [[1, 'ASC']],
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
                'name' => 'cuit',
                'data' => 'cuit',
                'title' => 'CUIT'
            ],
            [
                'name' => 'fantasy_name',
                'data' => 'fantasy_name',
                'title' => 'Nombre de Fantasía'
            ],
            [
                'name' => 'pay_name',
                'data' => 'pay_name',
                'title' => 'Nombre en cheque'
            ],
            [
                'name' => 'address',
                'data' => 'address',
                'title' => 'Dirección'
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
        return 'accounting_vendorsdatatable_' . time();
    }
}
