<?php

namespace App\Repositories;

use App\Models\categories;
use App\Models\image;
use App\Models\Products;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductsRepository
 * @package App\Repositories
 * @version May 29, 2020, 10:10 am UTC
*/

class ProductsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Products::class;
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function createWithImagesAndCategories($input)
    {
        list($categories, $input) = $this->getRelatedFields($input);
        /** @var products $model */
        $model =  $this->createWithImages($input);
        $model->categories()->sync($categories);

        return $model;
    }

    public function updateWithImagesAndCategories(array $input, int $id)
    {
        list($categories, $input) = $this->getRelatedFields($input);
        /** @var products $model */
        $model = $this->updateWithImages($input,$id);
        $model->categories()->sync($categories);

        return $model;
    }

    /**
     * @param array $input
     * @return array
     */
    public function getRelatedFields(array $input): array
    {
        $categories = [];
        if (isset($input["categories"])) {
            $categories = $input["categories"];
            unset($input["categories"]);
        }
        return array($categories, $input);
    }
}
