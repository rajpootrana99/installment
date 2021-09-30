<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.index');
    }

    public function fetchVendors(){
        $vendors = Vendor::all();
        return response()->json([
            'vendors' => $vendors,
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
            'marital_status' => 'required',
            'cell' => 'required',
            'cnic' => 'required',
            'residential_address' => 'required',
            'office_address' => 'required',
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

        $vendor = Vendor::create($request->all());
        $this->storeImage($vendor);
        if ($vendor){
            return response()->json(['status' => 1, 'message' => 'Vendor Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($vendor)
    {
        $vendor = Vendor::find($vendor);
        $marital_status = $vendor->getAttributes()['marital_status'];
        if ($vendor){
            return response()->json([
                'status' => 200,
                'vendor' => $vendor,
                'marital_status' => $marital_status,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Vendor not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $vendor)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'marital_status' => 'required',
            'cell' => 'required',
            'cnic' => 'required',
            'residential_address' => 'required',
            'office_address' => 'required',
            'residential_phone' => 'required',
            'residential_since' => 'required',
            'office_phone' => 'required',
            'cnic_front' => 'sometimes|file|image',
            'cnic_back' => 'sometimes|file|image',
            'image' => 'sometimes|file|image',
        ]);

        $vendor = Vendor::find($vendor);
        $vendor->update($request->all());
        $this->storeImage($vendor);
        if ($vendor){
            return response()->json(['status' => 1, 'message' => 'Vendor Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($vendor)
    {
        $vendor = Vendor::find($vendor);
        if (!$vendor){
            return response()->json([
                'status' => 0,
                'message' => 'Vendor not exist'
            ]);
        }
        $vendor->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Vendor Deleted Successfully'
        ]);
    }

    public function storeImage($vendor)
    {
        $vendor->update([
            'image' => $this->imagePath('image', 'vendor', $vendor),
            'cnic_front' => $this->imagePath('cnic_front', 'vendor', $vendor),
            'cnic_back' => $this->imagePath('cnic_back', 'vendor', $vendor),
        ]);
    }
}
