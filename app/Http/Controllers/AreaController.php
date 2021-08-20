<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('area.index');
    }

    public function fetchAreas(){
        $areas = Area::with('city')->get();
        return response()->json([
            'areas' => $areas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return response()->json([
            'cities' => $cities,
        ]);
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
            'name' => 'required|unique:areas',
            'city_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $area = Area::create($request->all());
        if ($area){
            return response()->json(['status' => 1, 'message' => 'Area added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($area)
    {
        $area = Area::find($area);
        $cities = City::all();
        if ($area){
            return response()->json([
                'status' => 200,
                'area' => $area,
                'cities' => $cities,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'area' => $area,
                'message' => 'City not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $area)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:areas',
            'city_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $area = Area::find($area);
        $area->update($request->all());
        if ($area){
            return response()->json(['status' => 1, 'message' => 'Area Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($area)
    {
        $area = Area::find($area);
        if (!$area){
            return response()->json([
                'status' => 0,
                'message' => 'Area not found',
            ]);
        }
        $area->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Area deleted successfully',
        ]);
    }
}
