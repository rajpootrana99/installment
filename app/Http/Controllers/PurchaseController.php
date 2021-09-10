<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Item;
use App\Models\PurchaseMaster;
use App\Models\Tax;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        $items = Item::all();
        $taxes = Tax::all();
        return view('purchase.index', [
            'vendors' => $vendors,
            'items' => $items,
            'taxes' => $taxes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase.create');
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
     * @param  \App\Models\PurchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseMaster $purchaseMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseMaster $purchaseMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseMaster $purchaseMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseMaster $purchaseMaster)
    {
        //
    }

    public function fetchTaxPercentage($id){
        $tax = Tax::where('id', $id)->first();
        if($tax){
            return response()->json([
                'status' => 1,
                'tax' => $tax,
            ]);
        }
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Tax not found',
            ]);
        }
    }

}
