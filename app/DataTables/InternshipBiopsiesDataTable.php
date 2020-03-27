<?php

namespace App\DataTables;

use App\Models\InternshipBiopsies;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class InternshipBiopsiesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'internship_biopsies.datatables_actions')
                        ->editColumn('delivery_date',function($biopsy) {
                            return Carbon::parse($biopsy->delivery_date)->format('d/m/Y');
                        })
                        ->editColumn('created_at',function($biopsy) {
                            return Carbon::parse($biopsy->created_at)->format('d/m/Y');
                        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InternshipBiopsies $model)
    {
        $biopsies = InternshipBiopsies::with('os','doctor','patologist','biopsy_type');
        return $this->applyScopes($biopsies);
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
                'name' => 'id',
                'data' => 'id',
                'title' => 'N°. Biopsia'
            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'F. Cirugía'
            ],
            [
                'name' => 'patient_document',
                'data' => 'patient_document',
                'title' => 'DNI del Paciente'
            ],
            [
                'name' => 'patient_name',
                'data' => 'patient_name',
                'title' => 'Nombre del Paciente'
            ],
            [
                'name' => 'biopsy_type_id',
                'data' => 'biopsy_type.name',
                'title' => 'T. de Biopsia'
            ],
            [
                'name' => 'doctor.name',
                'data' => 'doctor.name',
                'title' => 'Médico Actuante'
            ],
            [
                'name' => 'os_id',
                'data' => 'os.name',
                'title' => 'O.S'
            ],
            [
                'name' => 'delivery_date',
                'data' => 'delivery_date',
                'title' => 'Fecha Entrega'
            ],
            [
                'name' => 'autorized_order',
                'data' => 'autorized_order',
                'title' => 'O. Autorizada'
            ],
            [
                'name' => 'patologist_id',
                'data' => 'patologist.name',
                'title' => 'Patólogo'
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
        return 'Biopsias_de_Internados_' . time();
    }
}