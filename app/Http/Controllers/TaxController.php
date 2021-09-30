<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tax.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetchTax(){
        $taxes = Tax::all();
        return response()->json([
            'taxes' => $taxes,
        ]);
    }
    public function create()
    {
        //
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
            'percentage' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $tax = Tax::create($request->all());
        if ($tax){
            return response()->json(['status' => 1, 'message' => 'Tax Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit($tax)
    {
        $tax = Tax::find($tax);
        if ($tax){
            return response()->json([
                'status' => 200,
                'tax' => $tax,
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'tax' => 'Tax Detail Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tax)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'percentage' => 'required'
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $tax = Tax::find($tax);
            $tax->update($request->all());
            if ($tax){
                return response()->json(['status' => 1, 'message' => 'Tax Detail Updated Successfully']);
            }
        }catch (Exception $exception){
            return response()->json([
                'message' => $exception->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy($tax)
    {
        $tax = Tax::find($tax);
        if (!$tax){
            return response()->json([
                'status' => 0,
                'message' => 'Tax detail not exist'
            ]);
        }
        $tax->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Tax detail deleted successfully',
        ]);
    }
}
