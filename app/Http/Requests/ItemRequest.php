<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
    public function rules()
    {
        return [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'manufacturer_id' => 'required',
            'item_code' => 'required',
            'name' => 'required',
            'cost_price' => 'required',
            'sale_price_1' => 'required',
            'sale_price_2' => 'required',
            'sale_price_3' => 'required',
            'sale_price_4' => 'required',
            'sale_price_5' => 'required',
        ];
    }
}
