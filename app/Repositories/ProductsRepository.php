<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\BaseRepository;

/**
 * Class ProductsRepository
 * @package App\Repositories
 * @version May 29, 2020, 10:10 am UTC
*/

class ProductsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'main_description',
        'additional_description',
        'minor_description',
        'main_product',
        'price',
        'vat_code',
        'active',
        'sold_out',
        'ean',
        'is_receipt',
        'is_kitchen',
        'is_sticker',
        'is_deal'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Products::class;
    }
}
