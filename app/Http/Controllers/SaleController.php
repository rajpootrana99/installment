<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\SaleMaster;
use App\Models\Site;
use App\Models\Tax;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sale.index');
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
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function show(SaleMaster $saleMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleMaster $saleMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleMaster $saleMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleMaster  $saleMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleMaster $saleMaster)
    {
        //
    }
}
