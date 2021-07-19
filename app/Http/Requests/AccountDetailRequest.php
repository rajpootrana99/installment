<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountDetailRequest extends FormRequest
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
            'head_id' => 'required',
            'sub_head_id' => 'required',
            'account_detail_name' => 'required',
            'account_nature' => 'required',
            'account_code' => 'required',
        ];
    }
}
