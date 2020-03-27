<?php

namespace App\DataTables;

use App\Models\insuranceCompanies;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class insuranceCompaniesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'insurance_companies.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\insuranceCompanies $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(insuranceCompanies $model)
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
            ->addAction(['width' => '120px', 'title' => 'Acciones'])
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
                'title' => 'Nombre',
                'name' => 'name',
                'data' => 'name'
            ],
            [
                'title' => 'Dirección',
                'name' => 'address',
                'data' => 'address'
            ],
            [
                'title' => 'Teléfono',
                'name' => 'phone',
                'data' => 'phone'
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
        return 'insurance_companiesdatatable_' . time();
    }
}
