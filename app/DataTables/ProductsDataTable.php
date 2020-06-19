<?php

namespace App\DataTables;

use App\Models\Products;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ProductsDataTable extends DataTable
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
        return $dataTable->addColumn('action', 'products.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Products $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Products $model)
    {
        return $model::with('vat');
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
//                'order'     => [[15, 'desc']],
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
//            'id' => new Column(['title' => __('models/products.fields.id'), 'data' => 'id']),
            'article_number' => new Column(['title' => __('models/products.fields.article_number'), 'data' => 'article_number']),
            'name' => new Column(['title' => __('models/products.fields.name'), 'data' => 'name']),
//            'main_description' => new Column(['title' => __('models/products.fields.main_description'), 'data' => 'main_description']),
//            'additional_description' => new Column(['title' => __('models/products.fields.additional_description'), 'data' => 'additional_description']),
//            'minor_description' => new Column(['title' => __('models/products.fields.minor_description'), 'data' => 'minor_description']),
            'main_product' => new Column(['title' => __('models/products.fields.main_product'), 'data' => 'main_product']),
            'price' => new Column(['title' => __('models/products.fields.price'), 'data' => 'price']),
            'vat_code' => new Column(['title' => __('models/products.fields.vat_code'), 'data' => 'vat.code']),
            'active' => new Column(['title' => __('models/products.fields.active'), 'data' => 'active']),
            'sold_out' => new Column(['title' => __('models/products.fields.sold_out'), 'data' => 'sold_out']),
//            'ean' => new Column(['title' => __('models/products.fields.ean'), 'data' => 'ean']),
//            'is_receipt' => new Column(['title' => __('models/products.fields.is_receipt'), 'data' => 'is_receipt']),
//            'is_kitchen' => new Column(['title' => __('models/products.fields.is_kitchen'), 'data' => 'is_kitchen']),
//            'is_sticker' => new Column(['title' => __('models/products.fields.is_sticker'), 'data' => 'is_sticker']),
//            'is_deal' => new Column(['title' => __('models/products.fields.is_deal'), 'data' => 'is_deal']),
//            'updated_at' => new Column(['title' => __('models/products.fields.updated_at'), 'data' => 'updated_at'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'products_datatable_' . time();
    }
}
