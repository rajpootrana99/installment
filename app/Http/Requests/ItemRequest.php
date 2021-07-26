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
        return tap([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'manufacturer_id' => 'required',
            'warehouse_id' => 'required',
            'item_code' => 'required',
            'name' => 'required',
            'cost_price' => 'required',
            'purchase_price' => 'required',
            'company_price' => 'required',
            'is_sale_price_defined' => 'required',
            'sale_price_1' => 'required',
            'sale_price_2' => 'required',
            'sale_price_3' => 'required',
            'sale_price_4' => 'required',
            'sale_price_5' => 'required',
            'remarks' => 'required',
            'description' => 'required',
        ], function (){
            if (request()->hasFile(request()->image)) {
                request()->validate([
                    'image' => 'required|file|image',
                ]);
            }
        });
    }
}
