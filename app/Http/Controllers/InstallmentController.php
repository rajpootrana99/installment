<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\InstallmentMaster;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('installment.index');
    }

    public function fetchSaleOfficers(){
        $sale_officers = Employee::where('type', 0)->get();
        return response()->json([
            'status' => 1,
            'sale_officers' => $sale_officers,
        ]);
    }

    public function fetchInquiryOfficers(){
        $inquiry_officers = Employee::where('type', 2)->get();
        return response()->json([
            'status' => 1,
            'inquiry_officers' => $inquiry_officers,
        ]);
    }

    public function fetchMarketingOfficers(){
        $marketing_officers = Employee::where('type', 1)->get();
        return response()->json([
            'status' => 1,
            'marketing_officers' => $marketing_officers,
        ]);
    }

    public function fetchRecoveryOfficers(){
        $recovery_officers = Employee::where('type', 3)->get();
        return response()->json([
            'status' => 1,
            'recovery_officers' => $recovery_officers,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstallmentMaster  $installmentMaster
     * @return \Illuminate\Http\Response
     */
    public function show(InstallmentMaster $installmentMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstallmentMaster  $installmentMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(InstallmentMaster $installmentMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InstallmentMaster  $installmentMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstallmentMaster $installmentMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstallmentMaster  $installmentMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstallmentMaster $installmentMaster)
    {
        //
    }
}
