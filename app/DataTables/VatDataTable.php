<?php

namespace App\DataTables;

use App\Models\Vat;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class VatDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'vats.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vat $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vat $model)
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtipl',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner  d-none',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner  d-none',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner  d-none',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner  d-none',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner  d-none',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                    [
                        'extend' => 'csv',
                        'className' => 'btn btn-default btn-sm no-corner d-none',
                        'text' => '<i class="fa fa-refresh"></i> CSV'
                    ],
                    [
                        'extend' => 'excel',
                        'className' => 'btn btn-default btn-sm no-corner d-none',
                        'text' => '<i class="fa fa-refresh"></i> Excel'
                    ],
                    [
                        'extend' => 'pdf',
                        'className' => 'btn btn-default btn-sm no-corner d-none',
                        'text' => '<i class="fa fa-refresh"></i> Pdf'
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
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
            'code' => new Column(['title' => __('models/vats.fields.code'), 'data' => 'code']),
            'Description' => new Column(['title' => __('models/vats.fields.Description'), 'data' => 'Description']),
            'Percentage' => new Column(['title' => __('models/vats.fields.Percentage'), 'data' => 'Percentage']),
            'is_sales' => new Column(['title' => __('models/vats.fields.is_sales'), 'data' => 'is_sales']),
            'is_purchase' => new Column(['title' => __('models/vats.fields.is_purchase'), 'data' => 'is_purchase'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'vats_datatable_' . time();
    }
}
