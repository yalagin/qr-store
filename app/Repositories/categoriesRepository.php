<?php

namespace App\Repositories;

use App\Models\categories;
use App\Repositories\BaseRepository;

/**
 * Class categoriesRepository
 * @package App\Repositories
 * @version May 27, 2020, 11:38 am UTC
*/

class categoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'active',
        'excluding_discounts',
        'product_remark'
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
        return categories::class;
    }
}
