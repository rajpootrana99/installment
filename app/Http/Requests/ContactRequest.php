<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'account_number' => 'required',
            'contact_name' => 'required',
            'company_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'cell' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'second_phone' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'web' => 'required',
            'ntn' => 'required',
            'credit_limit' => 'required',
            'recovery_day' => 'required',
        ], function (){
            if (request()->hasFile(request()->image)) {
                request()->validate([
                    'image' => 'required|file|image',
                ]);
            }
            if (request()->hasFile(request()->cnic_front)) {
                request()->validate([
                    'cnic_front' => 'required|file|image',
                ]);
            }
            if (request()->hasFile(request()->cnic_back)) {
                request()->validate([
                    'cnic_back' => 'required|file|image',
                ]);
            }
            if (request()->hasFile(request()->document)) {
                request()->validate([
                    'document' => 'required|file',
                ]);
            }
        });
    }
}
