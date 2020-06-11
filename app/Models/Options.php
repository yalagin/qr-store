<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Options",
 *      required={"name", "input_type", "min", "max"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="input_type",
 *          description="input_type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="min",
 *          description="min",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="max",
 *          description="max",
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
class Options extends Model
{
    use SoftDeletes;

    public $table = 'options';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'input_type',
        'min',
        'max'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'input_type' => 'string',
        'min' => 'string',
        'max' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2',
        'input_type' => 'required',
        'min' => 'required',
        'max' => 'required|integer'
    ];

    
}
