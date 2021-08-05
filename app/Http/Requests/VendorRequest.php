<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name' => 'required',
            'father_name' => 'required',
            'material_status' => 'required',
            'cell' => 'required|numeric',
            'cnic' => 'required|numeric',
            'residential_address' => 'required',
            'office_address' => 'required',
            'residential_phone' => 'required|numeric',
            'residential_since' => 'required',
            'office_phone' => 'required|numeric',
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
        });
    }
}
