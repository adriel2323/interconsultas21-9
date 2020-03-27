<?php

namespace App\DataTables\Accounting;

use App\Models\Accounting\Receipts;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ReceiptsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'accounting.receipts.datatables_actions')
                         ->editColumn('receipt_date', function(Receipts $data) {
                             return Carbon::parse($data->receipt_date)->format('d/m/Y');
                         });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Receipts $model)
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
            ->addAction(['width' => '80px'])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
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
                'name' => 'number',
                'data' => 'number',
                'title' => 'Número de recibo'
            ],
            [
                'name' => 'receipt_date',
                'data' => 'receipt_date',
                'title' => 'Fecha de Recibo'
            ],
            [
                'name' => 'amount',
                'data' => 'amount',
                'title' => 'Monto'
            ],
            [
                'name' => 'company',
                'data' => 'company',
                'title' => 'Persona / Compañía que entrega'
            ],
            [
                'name' => 'comments',
                'data' => 'comments',
                'title' => 'Comentarios'
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
        return 'Tabla_de_Recibos' . time();
    }
}