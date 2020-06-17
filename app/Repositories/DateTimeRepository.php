<?php

namespace App\Repositories;

use App\Models\DateTime;
use App\Repositories\BaseRepository;

/**
 * Class DateTimeRepository
 * @package App\Repositories
 * @version June 17, 2020, 1:16 pm UTC
*/

class DateTimeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'short_date',
        'long_date',
        'short_time',
        'long_time',
        'first_day_of_week',
        'time_format'
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
        return DateTime::class;
    }
}
