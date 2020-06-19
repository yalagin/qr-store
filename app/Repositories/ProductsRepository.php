<?php

namespace App\Repositories;

use App\Models\categories;
use App\Models\image;
use App\Models\Products;
use App\Models\Vat;
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
    public function createWithRelationships($input)
    {
        list($vat, $categories, $input) = $this->getRelatedFields($input);
        /** @var products $model */
        $model =  $this->createWithImages($input);
        $model->categories()->sync($categories);
        $model->vat()->associate($vat);
        $model->save();
        return $model;
    }

    public function updateWithRelationships(array $input, int $id)
    {
        list($vat, $categories, $input) = $this->getRelatedFields($input);
        /** @var products $model */
        $model = $this->updateWithImages($input,$id);
        $model->categories()->sync($categories);
        $model->vat()->associate($vat);
        $model->save();
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
        }
        $vat = null;
        if (isset($input["vat"])) {
            $vat = $input['vat'];
        }
        return array($vat,$categories, $input);
    }
}
