<?php


namespace App\DataTables;


use App\Models\Products;

class ProductsDependentOncategoriesDataTable extends ProductsDataTable
{

    public $category = null;

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Products $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Products $model)
    {
        return $model->newQuery()->whereHas('categories', function ($query) {
            $query->where('id', $this->category );
        });
    }

    /**
     * @param int $category
     * @return ProductsDependentOncategoriesDataTable
     */
    public function setCategoryId(int $category)
    {
        $this->category = $category;
        return $this;
    }
}
