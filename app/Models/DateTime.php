<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DateTime",
 *      required={"short_date", "long_date", "short_time", "long_time", "first_day_of_week"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="short_date",
 *          description="short_date",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="long_date",
 *          description="long_date",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="short_time",
 *          description="short_time",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="long_time",
 *          description="long_time",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="first_day_of_week",
 *          description="first_day_of_week",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="time_format",
 *          description="time_format",
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
class DateTime extends Model
{
    use SoftDeletes;

    public $table = 'date_times';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'short_date',
        'long_date',
        'short_time',
        'long_time',
        'first_day_of_week',
        'time_format'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'short_date' => 'string',
        'long_date' => 'string',
        'short_time' => 'string',
        'long_time' => 'string',
        'first_day_of_week' => 'string',
        'time_format' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'short_date' => 'required',
        'long_date' => 'required',
        'short_time' => 'required',
        'long_time' => 'required',
        'first_day_of_week' => 'required',
        'time_format' => 'required'
    ];


}
