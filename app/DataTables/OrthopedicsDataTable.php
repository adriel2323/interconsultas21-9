<?php

namespace App\DataTables;

use App\Models\Orthopedics;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class OrthopedicsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'orthopedics.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Orthopedics $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Orthopedics $model)
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
                'title' => 'Nombre',
                'data' => 'name'
            ],
            [
                'name' => 'address',
                'title' => 'Dirección',
                'data' => 'address'
            ],
            [
                'name' => 'phone',
                'title' => 'Teléfono',
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
        return 'orthopedicsdatatable_' . time();
    }
}
