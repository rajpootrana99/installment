<?php

namespace App\Http\Controllers;

use App\Models\InstallmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstallmentPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('installmentPlan.index');
    }

    public function fetchInstallmentPlans(){
        $installmentPlans = InstallmentPlan::all();
        return response()->json([
            'installmentPlans' => $installmentPlans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'plan' => 'required',
            'duration' => 'required|numeric',
            'percentage' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $installmentPlan = InstallmentPlan::create($request->all());
        if ($installmentPlan){
            return response()->json(['status' => 1, 'message' => 'Installment Plan Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function show(InstallmentPlan $installmentPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($installmentPlan)
    {
        $installmentPlan = InstallmentPlan::find($installmentPlan);
        if ($installmentPlan){
            return response()->json([
                'status' => 200,
                'installmentPlan' => $installmentPlan,
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'installmentPlan' => 'Installment Plan Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $installmentPlan)
    {
        $validator = Validator::make($request->all(), [
            'plan' => 'required',
            'duration' => 'required|numeric',
            'percentage' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        try {
            $installmentPlan = InstallmentPlan::find($installmentPlan);
            $installmentPlan->update($request->all());
            if ($installmentPlan){
                return response()->json(['status' => 1, 'message' => 'Installment Plan Updated Successfully']);
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
     * @param  \App\Models\InstallmentPlan  $installmentPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($installmentPlan)
    {
        $installmentPlan = InstallmentPlan::find($installmentPlan);
        if (!$installmentPlan){
            return response()->json([
                'status' => 0,
                'message' => 'Installment Plan not exist'
            ]);
        }
        $installmentPlan->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Installment Plan deleted successfully',
        ]);
    }
}
