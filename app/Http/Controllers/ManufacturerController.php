<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerRequest;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manufacturer.index');
    }

    public function fetchManufacturers(){
        $manufacturers = Manufacturer::all();
        return response()->json([
            'manufacturers' => $manufacturers,
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
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $manufacturer = Manufacturer::create($request->all());
        if ($manufacturer){
            return response()->json(['status' => 1, 'message' => 'Manufacturer Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit($manufacturer)
    {
        $manufacturer = Manufacturer::find($manufacturer);
        if ($manufacturer){
            return response()->json([
                'status' => 200,
                'manufacturer' => $manufacturer,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Manufacturer not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $manufacturer)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $manufacturer = Manufacturer::find($manufacturer);
        $manufacturer->update($request->all());
        if ($manufacturer){
            return response()->json(['status' => 1, 'message' => 'Manufacturer Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($manufacturer)
    {
        $manufacturer = Manufacturer::find($manufacturer);
        if (!$manufacturer){
            return response()->json([
                'status' => 0,
                'message' => 'Manufacturer not exist'
            ]);
        }
        $manufacturer->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Manufacturer deleted successfully'
        ]);
    }
}
