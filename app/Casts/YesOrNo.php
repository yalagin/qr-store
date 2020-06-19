<?php


namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class YesOrNo implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return string
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if ($value) {
            return __('validation.attributes.yes');
        } else {
            return  __('validation.attributes.no');
        }
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param array $value
     * @param array $attributes
     * @return array
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
