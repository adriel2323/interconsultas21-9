<?php

namespace App\DataTables;

use App\Models\Doctor;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DoctorDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'doctors.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Doctor $model)
    {
        $Doctors = Doctor::with('service');
        return $this->applyScopes($Doctors);
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
            ->addAction(['width' => '80px', 'title' => 'Acciones'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'buttons' => [
                    'excel',
                ],
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
                'name' => 'license',
                'data' => 'license',
                'title' => 'N° Matrícula'
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'Nombre y Apellido'
            ],
            [
                'name' => 'service_id',
                'data' => 'service.name',
                'title' => 'Servicio'
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
        return 'doctorsdatatable_' . time();
    }
}