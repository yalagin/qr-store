<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class categories
 * @package App\Models
 * @version May 27, 2020, 11:38 am UTC
 *
 * @property string $name
 * @property string $description
 * @property integer $active
 * @property integer $excluding_discounts
 * @property integer $product_remark
 */
class categories extends Model
{
    use SoftDeletes;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'active',
        'excluding_discounts',
        'product_remark'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'active' => 'integer',
        'excluding_discounts' => 'integer',
        'product_remark' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255'
    ];

    
}
