<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Currency",
 *      required={"currency_symbol", "position_of_symbol", "decimal_symbol", "decimal_digits", "digital_grouping_symbol"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="currency_symbol",
 *          description="currency_symbol",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="position_of_symbol",
 *          description="position_of_symbol",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decimal_symbol",
 *          description="decimal_symbol",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="decimal_digits",
 *          description="decimal_digits",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="digital_grouping_symbol",
 *          description="digital_grouping_symbol",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Currency extends Model
{
    use SoftDeletes;

    public $table = 'currencies';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'currency_symbol',
        'position_of_symbol',
        'decimal_symbol',
        'decimal_digits',
        'digital_grouping_symbol'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'currency_symbol' => 'string',
        'position_of_symbol' => 'string',
        'decimal_symbol' => 'string',
        'decimal_digits' => 'string',
        'digital_grouping_symbol' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'currency_symbol' => 'required',
        'position_of_symbol' => 'required',
        'decimal_symbol' => 'required',
        'decimal_digits' => 'required',
        'digital_grouping_symbol' => 'required'
    ];
}
