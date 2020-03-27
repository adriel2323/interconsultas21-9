<?php

namespace App\DataTables;

use App\Models\WebNews;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class WebNewsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'web_news.datatables_actions')
                        ->rawColumns(['title', 'short_description', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\WebNews $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(WebNews $model)
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
                'title' => 'Título',
                'name' => 'title',
                'data' => 'title'
            ],
            [
                'title' => 'Descripción corta',
                'name' => 'short_description',
                'data' => 'short_description'
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
        return 'web_newsdatatable_' . time();
    }
}
