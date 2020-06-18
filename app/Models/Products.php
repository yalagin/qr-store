<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Products",
 *      required={"article_number", "name", "price", "vat_code", "ean"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="article_number",
 *          description="article_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="main_description",
 *          description="main_description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="additional_description",
 *          description="additional_description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="minor_description",
 *          description="minor_description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="main_product",
 *          description="main_product",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="vat_code",
 *          description="vat_code",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="active",
 *          description="active",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="sold_out",
 *          description="sold_out",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ean",
 *          description="ean",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="is_receipt",
 *          description="is_receipt",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_kitchen",
 *          description="is_kitchen",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_sticker",
 *          description="is_sticker",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="is_deal",
 *          description="is_deal",
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
class Products extends Model
{
    use SoftDeletes;

    public $table = 'products';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'article_number',
        'name',
        'main_description',
        'additional_description',
        'minor_description',
        'main_product',
        'price',
        'vat_code',
        'active',
        'sold_out',
        'ean',
        'is_receipt',
        'is_kitchen',
        'is_sticker',
        'is_deal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'article_number' => 'string',
        'name' => 'string',
        'main_description' => 'string',
        'additional_description' => 'string',
        'minor_description' => 'string',
        'main_product' => 'integer',
        'price' => 'string',
        'vat_code' => 'string',
        'active' => 'integer',
        'sold_out' => 'integer',
        'ean' => 'string',
        'is_receipt' => 'integer',
        'is_kitchen' => 'integer',
        'is_sticker' => 'integer',
        'is_deal' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'article_number' => 'required|unique:products',
        'name' => 'required',
        'main_product' => 'boolean',
        'price' => 'required|integer',
        'vat_code' => 'required|integer',
        'active' => 'boolean',
        'sold_out' => 'boolean',
        'ean' => 'required|digits:13',
        'is_receipt' => 'boolean',
        'is_kitchen' => 'boolean',
        'is_sticker' => 'boolean',
        'is_deal' => 'boolean'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function images()
    {
        return $this->hasMany(\App\Models\image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function categories()
    {
        return $this->belongsToMany(\App\Models\categories::class);
    }
}
