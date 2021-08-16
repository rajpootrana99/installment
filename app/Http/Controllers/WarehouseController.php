<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('warehouse.index');
    }

    public function fetchWarehouses(){
        $warehouses = Warehouse::all();
        return response()->json([
            'warehouses' => $warehouses,
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
        $warehouse = Warehouse::create($request->all());
        if ($warehouse){
            return response()->json(['status' => 1, 'message' => 'Warehouse Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit($warehouse)
    {
        $warehouse = Warehouse::find($warehouse);
        if ($warehouse){
            return response()->json([
                'status' => 200,
                'warehouse' => $warehouse,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Warehouse not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $warehouse)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $warehouse = Warehouse::find($warehouse);
        $warehouse->update($request->all());
        if ($warehouse){
            return response()->json(['status' => 1, 'message' => 'Warehouse Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy($warehouse)
    {
        $warehouse = Warehouse::find($warehouse);
        if (!$warehouse){
            return response()->json([
                'status' => 0,
                'message' => 'Warehouse not exist',
            ]);
        }
        $warehouse->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Warehouse deleted successfully',
        ]);
    }
}
