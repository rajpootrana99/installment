<?php

namespace App\Http\Controllers;

use App\Models\InstallmentSchedule;
use Illuminate\Http\Request;

class InstallmentScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('installmentSchedule.index');
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
     * @param  \App\Models\InstallmentSchedule  $installmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(InstallmentSchedule $installmentSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstallmentSchedule  $installmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(InstallmentSchedule $installmentSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InstallmentSchedule  $installmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InstallmentSchedule $installmentSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstallmentSchedule  $installmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstallmentSchedule $installmentSchedule)
    {
        //
    }
}
