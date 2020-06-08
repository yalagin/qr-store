<?php

namespace App\Repositories;

use App\Models\categories;
use App\Models\image;
use App\Models\Products;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class categoriesRepository
 * @package App\Repositories
 * @version June 2, 2020, 6:48 pm UTC
 */
class categoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'active',
        'excluding_discounts',
        'product_remark'
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
        return categories::class;
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function createWithImagesAndProducts($input)
    {
        $products = [];
        if(isset($input["products"])) {
            $products = $input["products"];
            unset($input["products"]);
        }
        /** @var categories $model */
        $model =  $this->createWithImages($input);
        $model->products()->sync($products);

        return $model;
    }

    public function updateWithImagesAndProducts(array $input, int $id)
    {
        $products = [];
        if(isset($input["products"])) {
            $products = $input["products"];
            unset($input["products"]);
        }
        /** @var categories $model */
        $model = $this->updateWithImages($input,$id);
        $model->products()->sync($products);

        return $model;
    }
}
