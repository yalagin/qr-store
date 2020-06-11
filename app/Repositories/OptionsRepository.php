<?php

namespace App\Repositories;

use App\Models\Options;
use App\Repositories\BaseRepository;

/**
 * Class OptionsRepository
 * @package App\Repositories
 * @version June 9, 2020, 1:32 pm UTC
*/

class OptionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'input_type',
        'min',
        'max'
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
        return Options::class;
    }
}
