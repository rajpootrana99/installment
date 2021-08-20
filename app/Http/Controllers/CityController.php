<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('city.index');
    }

    public function fetchCities(){
        $cities = City::all();
        return response()->json([
            'cities' => $cities,
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
            'name' => 'required|unique:cities',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $city = City::create($request->all());
        if ($city){
            return response()->json(['status' => 1, 'message' => 'City added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($city)
    {
        $city = City::find($city);
        if ($city){
            return response()->json([
                'status' => 200,
                'city' => $city,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'City not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$city)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:cities',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $city = City::find($city);
        $city->update($request->all());
        if ($city){
            return response()->json(['status' => 1, 'message' => 'City updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($city)
    {
        $city = City::find($city);
        if (!$city){
            return response()->json([
                'status' => 0,
                'message' => 'City not found',
            ]);
        }
        $city->delete();
        return response()->json([
            'status' => 1,
            'message' => 'City deleted successfully',
        ]);
    }
}
