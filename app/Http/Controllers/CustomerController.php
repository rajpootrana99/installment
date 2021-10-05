<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.index');
    }

    public function fetchCustomers(){
        $customers = Customer::all();
        return response()->json([
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'type' => 'required',
            'marital_status' => 'required',
            'cell' => 'required',
            'cnic' => 'required',
            'monthly_income' => 'required',
            'residential_address' => 'required',
            'office_address' => 'required',
            'caste' => 'required',
            'cnic_expiry' => 'required',
            'dob' => 'required',
            'occupation' => 'required',
            'designation' => 'required',
            'work_since' => 'required',
            'residential_phone' => 'required',
            'residential_since' => 'required',
            'office_phone' => 'required',
            'cnic_front' => 'sometimes|file|image',
            'cnic_back' => 'sometimes|file|image',
            'image' => 'sometimes|file|image',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $customer = Customer::create($request->all());
        $this->storeImage($customer);
        if ($customer){
            return response()->json(['status' => 1, 'message' => 'Customer Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        $customer = Customer::find($customer);
        $type = $customer->getAttributes()['type'];
        if ($customer){
            return response()->json([
                'status' => 200,
                'customer' => $customer,
                'type' => $type,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Customer not found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
        $customer = Customer::find($customer);
        $type = $customer->getAttributes()['type'];
        $marital_status = $customer->getAttributes()['marital_status'];
        if ($customer){
            return response()->json([
                'status' => 200,
                'customer' => $customer,
                'type' => $type,
                'marital_status' => $marital_status,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Customer not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'type' => 'required',
            'marital_status' => 'required',
            'cell' => 'required',
            'cnic' => 'required',
            'monthly_income' => 'required',
            'residential_address' => 'required',
            'office_address' => 'required',
            'caste' => 'required',
            'cnic_expiry' => 'required',
            'dob' => 'required',
            'occupation' => 'required',
            'designation' => 'required',
            'work_since' => 'required',
            'residential_phone' => 'required',
            'residential_since' => 'required',
            'office_phone' => 'required',
            'cnic_front' => 'sometimes|file|image',
            'cnic_back' => 'sometimes|file|image',
            'image' => 'sometimes|file|image',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $customer = Customer::find($customer);
        $customer->update($request->all());
        $this->storeImage($customer);
        if ($customer){
            return response()->json(['status' => 1, 'message' => 'Customer Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        $customer = Customer::find($customer);
        if (!$customer){
            return response()->json([
                'status' => 0,
                'message' => 'Customer not exist'
            ]);
        }
        $customer->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Customer Deleted Successfully'
        ]);
    }

    public function storeImage($customer)
    {
        $customer->update([
            'image' => $this->imagePath('image', 'customer', $customer),
            'cnic_front' => $this->imagePath('cnic_front', 'customer', $customer),
            'cnic_back' => $this->imagePath('cnic_back', 'customer', $customer),
        ]);
    }
}
