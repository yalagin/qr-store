<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Products;

class UpdateProductsRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Products $id )
    {
        $rules = Products::$rules;
        $rules['article_number']='required|unique:products,article_number,'.$this->route('product');
        return $rules;
    }
}
