<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinancialYearRequest;
use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('financialYear.index');
    }

    public function fetchFinancialYears(){
        $financialYears = FinancialYear::all();
        return response()->json([
            'financialYears' => $financialYears,
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
            'start_date' => 'required',
            'end_date' => 'required',
            'year_string' => 'required',
            'status' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $financialYear = FinancialYear::create($request->all());
        if ($financialYear){
            return response()->json(['status' => 1, 'message' => 'Financial Year Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialYear $financialYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function edit($financialYear)
    {
        $financialYear = FinancialYear::find($financialYear);
        $status = $financialYear->getAttributes()['status'];
        if ($financialYear){
            return response()->json([
                'status' => 200,
                'financialYear' => $financialYear,
                'status' => $status
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Financial Year Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $financialYear)
    {
        $validator = Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date' => 'required',
            'year_string' => 'required',
            'status' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $financialYear = FinancialYear::find($financialYear);
        $financialYear->update($request->all());
        return response()->json(['status' => 1, 'message' => 'Financial Year Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinancialYear  $financialYear
     * @return \Illuminate\Http\Response
     */
    public function destroy($financialYear)
    {
        $financialYear = FinancialYear::find($financialYear);
        if (!$financialYear){
            return response()->json([
                'status' => 0,
                'message' => 'Financial Year not exist'
            ]);
        }
        $financialYear->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Financial Year Deleted Successfully'
        ]);
    }
}
