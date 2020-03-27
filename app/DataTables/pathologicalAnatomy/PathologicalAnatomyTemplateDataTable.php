<?php

namespace App\DataTables\pathologicalAnatomy;

use App\Models\pathologicalAnatomy\PathologicalAnatomyTemplate;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PathologicalAnatomyTemplateDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'pathologicalAnatomy.pathological_anatomy_templates.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\PathologicalAnatomyTemplate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PathologicalAnatomyTemplate $model)
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
                'title' => 'Código',
                'name' => 'code',
                'data' => 'code'
            ],
            [
                'title' => 'Descripción',
                'name' => 'description',
                'data' => 'description'
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
        return 'pathological_anatomy_templatesdatatable_' . time();
    }
}
