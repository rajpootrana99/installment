<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuaranterRequest extends FormRequest
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
            'phone' => 'required|numeric',
            'cnic' => 'required',
            'monthly_income' => 'required',
            'residential_address' => 'required',
            'office_address' => 'required',
            'occupation' => 'required',
            'designation' => 'required',
            'work_since' => 'required',
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
