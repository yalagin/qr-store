<?php

namespace App\Repositories;

use App\Models\Vat;
use App\Repositories\BaseRepository;

/**
 * Class VatRepository
 * @package App\Repositories
 * @version June 15, 2020, 11:15 am UTC
*/

class VatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'Description',
        'Percentage',
        'is_sales',
        'is_purchase'
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
        return Vat::class;
    }
}
