<?php

namespace App\Repositories;

use App\Models\image;
use App\Repositories\BaseRepository;

/**
 * Class imageRepository
 * @package App\Repositories
 * @version May 27, 2020, 5:12 pm UTC
*/

class imageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'image_url'
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
        return image::class;
    }
}
