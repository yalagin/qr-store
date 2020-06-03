<?php

namespace App\Repositories;

use App\Models\categories;
use App\Models\image;
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
    public function createWithImages($input)
    {
        $images = [];
        foreach($input["images"] as $i){
            $images[$i]= image::find($i);
        }
        unset($input["images"]);
        /** @var categories $category */
        $category =  $this->create($input);
        $category->images()->saveMany($images);

        return $category;
    }
}
