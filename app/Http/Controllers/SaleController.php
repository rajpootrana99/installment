<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Item;
use App\Models\SaleFooter;
use App\Models\SaleMaster;
use App\Models\Site;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required',
            'date' => 'required',
            'customer_id' => 'required',
            'site_id' => 'required',
            'item_id' => 'required',
            'qty' => 'sometimes',
            'rate' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $saleMaster = SaleMaster::create([
            'invoice_no' => $request->invoice_no,
            'customer_id' => $request->customer_id,
            'site_id' => $request->site_id,
            'user_id' => Auth::id(),
            'date' => $request->date,
        ]);

        $item_id = $request->item_id;
        $tax_id = $request->tax_id;
        $qty = $request->qty;
        $rate = $request->rate;
        $gross_total = $request->gross_total;
        $discount = $request->discount;
        $total = $request->total;
        for ($count=0; $count < count($item_id); $count++){
            $saleMaster->items()->attach($item_id[$count], [
                'qty' => $qty[$count],
                'rate' => $rate[$count],
                'gross_total' => $gross_total[$count],
                'discount' => $discount[$count],
                'tax_id' => $tax_id[$count],
                'total' => $total[$count],
            ]);
        }

        $saleFooter = SaleFooter::create([
            'sale_master_id' => $saleMaster->id,
            'gross_value' => $request->gross_value,
            'discount_total' => $request->discount_total,
            'tax_total' => $request->tax_total,
            'extra_discount' => $request->extra_discount,
            'net_value' => $request->net_value,
            'remarks' => $request->remarks,
        ]);

        if ($saleMaster && $saleFooter){
            return response()->json(['status' => 1, 'message' => 'Sale Invoice Added Successfully']);
        }
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
