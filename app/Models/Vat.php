<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Vat",
 *      required={"code", "Description", "Percentage"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="code",
 *          description="code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Description",
 *          description="Description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Percentage",
 *          description="Percentage",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="is_sales",
 *          description="is_sales",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_purchase",
 *          description="is_purchase",
 *          type="integer",
 *          format="int32"
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
class Vat extends Model
{
    use SoftDeletes;

    public $table = 'vats';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'code',
        'Description',
        'Percentage',
        'is_sales',
        'is_purchase'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'Description' => 'string',
        'Percentage' => 'string',
        'is_sales' => 'integer',
        'is_purchase' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required',
        'Description' => 'required',
        'Percentage' => 'required'
    ];

    
}
