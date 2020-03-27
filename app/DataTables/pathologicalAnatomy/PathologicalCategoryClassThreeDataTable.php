<?php

namespace App\DataTables\pathologicalAnatomy;

use App\Models\pathologicalAnatomy\PathologicalCategoryClassThree;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PathologicalCategoryClassThreeDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'pathologicalAnatomy.pathological_category_class_three.datatables_actions')
                         ->editColumn('pathology_category_class_two_id', function(PathologicalCategoryClassThree $row) {
                            return $row->parentCategory->name;
                         });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\pathologicalAnatomy\PathologicalCategoryClassOne $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PathologicalCategoryClassThree $model)
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
                'title' => 'Nombre',
                'name' => 'name',
                'data' => 'name'
            ],
            [
                'title' => 'Categoría de principal',
                'name' => 'pathology_category_class_two_id',
                'data' => 'pathology_category_class_two_id'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pathological_category_class_three_datatable_' . time();
    }
}
