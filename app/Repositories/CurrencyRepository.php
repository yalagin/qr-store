<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Repositories\BaseRepository;

/**
 * Class CurrencyRepository
 * @package App\Repositories
 * @version June 16, 2020, 3:17 pm UTC
*/

class CurrencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'currency_symbol',
        'position_of_symbol',
        'decimal_symbol',
        'decimal_digits',
        'digital_grouping_symbol'
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
        return Currency::class;
    }
}
