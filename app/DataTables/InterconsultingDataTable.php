<?php

namespace App\DataTables;

use App\Models\Interconsulting;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class InterconsultingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'interconsultings.datatables_actions')
                            ->editColumn('created_at', function ($data) {
                                return Carbon::parse($data->created_at)->format('d/m/Y H:i');
                            })
                            ->editColumn('requester_id', function ($data) {
                                return $data->requester->name;
                            })
                            ->editColumn('requested_doctor_id', function ($data) {
                                return isset($data->requested->name) ? $data->requested->name : "NO CARGADO";
                            })
                            ->editColumn('requested_service_id', function ($data) {
                                return $data->service->name;
                            })
                            ->editColumn('room_id', function ($data) {
                                return $data->room->name;
                            })
                            ->editColumn('status_id', function ($data) {

                                if($data->status_id == 1) {

                                    return "<button class='btn btn-xs' style='background-color:yellow;color:grey;'><b>".$data->status->name."</b></button>";

                                } else if ($data->status_id == 2) {

                                    return "<button class='btn btn-xs' style='background-color:blue;color:#fff;'><b>".$data->status->name."</b></button>";

                                } else if ($data->status_id == 3) {

                                    return "<button class='btn btn-xs' style='background-color:green;color:#fff;'><b>".$data->status->name."</b></button>";

                                }

                                return "<button class='btn btn-xs' style='background-color:red;color:#fff;'><b>".$data->status->name."</b></button>";


                            })
                            ->rawColumns(['status_id','action']);

}

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Interconsulting $model)
    {
        $interconsultings = Interconsulting::with('requested','requester','service','status','room');

        $interconsultings->where('status_id',1)->orWhere('status_id', 2);

        return $this->applyScopes($interconsultings);
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
            ->addAction(['title' => 'Acciones', 'width' => '20%'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order' => [0,'desc'],
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
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'Fecha',
                'width' => '10%'
            ],
            [
                'name' => 'patient_name',
                'data' => 'patient_name',
                'title' => 'Nombre del Paciente',
                'width' => '10%'
            ],
            [
                'name' => 'room_id',
                'data' => 'room_id',
                'title' => 'N° Habitación',
                'width' => '10%'
            ],
            [
                'name' => 'requester_id',
                'data' => 'requester_id',
                'title' => 'Solicitante',
                'width' => '20%'
            ],
            [

                'name' => 'requested_doctor_id',
                'data' => 'requested_doctor_id',
                'title' => 'Solicitado',
                'width' => '20%'
            ],
            [
                'name' => 'requested_service_id',
                'data' => 'requested_service_id',
                'title' => 'Servicio Solicitado',
                'width' => '10%'
            ],
            [
                'name' => 'status_id',
                'data' => 'status_id',
                'title' => 'Estado',
                'width' => '5%'
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
        return 'Interconsultas_' . time();
    }
}