<?php

namespace App\DataTables;

use App\Models\EmergencyConsultings;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class EmergencyConsultingsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'emergency_consultings.datatables_actions')
                            ->editColumn('created_at',function($query) {
                                return Carbon::parse($query->created_at)->format('d/m/Y H:i');
                            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmergencyConsultings $model)
    {
        $queries = EmergencyConsultings::with('os','doctor');
        return $this->applyScopes($queries);
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
                'order' => [0,'desc'],
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
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Fecha de Consulta'
            ],

            [
                'name' => 'doctor',
                'data' => 'doctor.name',
                'title' => 'Médico Actuante'
            ],

            [
                'name' => 'os',
                'data' => 'os.name',
                'title' => 'Obra Social'
            ],

            [
                'name' => 'dni',
                'data' => 'dni',
                'title' => 'N° Documento'
            ],

            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'Nombre y Apellido'
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
        return 'Consultas_de_guardia' . time();
    }
}