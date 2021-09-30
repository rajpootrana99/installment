<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\GoodsDetail;
use App\Models\GoodsMaster;
use App\Models\Item;
use App\Models\PurchaseFooter;
use App\Models\PurchaseMaster;
use App\Models\Tax;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required',
            'date' => 'required',
            'vendor_invoice_no' => 'required',
            'vendor_id' => 'required',
            'bilty_no' => 'required',
            'goods_id' => 'required',
            'shipment_date' => 'required',
            'delivery_date' => 'required',
            'broker_id' => 'required',
            'vehicle_no' => 'required',
            'goods_qty' => 'required',
            'gate_pass_no' => 'sometimes',
            'item_id' => 'required',
            'barcode' => 'sometimes',
            'qty' => 'sometimes',
            'rate' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $purchaseMaster = PurchaseMaster::create([
            'invoice_no' => $request->invoice_no,
            'vendor_id' => $request->vendor_id,
            'date' => $request->date,
            'vendor_invoice_no' => $request->vendor_invoice_no,
        ]);

        $goodsMaster = GoodsMaster::create([
            'purchase_master_id' => $purchaseMaster->id,
            'user_id' => Auth::id(),
            'broker_id' => $request->broker_id,
            'goods_id' => $request->goods_id,
            'bilty_no' => $request->bilty_no,
            'shipment_date' => $request->shipment_date,
            'delivery_date' => $request->delivery_date,
        ]);

        $vehicle_no = $request->vehicle_no;
        $goods_qty = $request->goods_qty;
        $gate_pass_no = $request->gate_pass_no;
        for ($count=0; $count < count($vehicle_no); $count++){
            $goodsDetail = GoodsDetail::create([
                'goods_master_id' => $goodsMaster->id,
                'vehicle_no' => $vehicle_no[$count],
                'qty' => $goods_qty[$count],
                'gate_pass_no' => $gate_pass_no[$count],
            ]);
        }

        $item_id = $request->item_id;
        $tax_id = $request->tax_id;
        $qty = $request->qty;
        $rate = $request->rate;
        $gross_total = $request->gross_total;
        $discount_1 = $request->discount_1;
        $discount_2 = $request->discount_2;
        $total = $request->total;
        for ($count=0; $count < count($item_id); $count++){
            $purchaseMaster->items()->attach($item_id[$count], [
                'qty' => $qty[$count],
                'rate' => $rate[$count],
                'gross_total' => $gross_total[$count],
                'discount_1' => $discount_1[$count],
                'discount_2' => $discount_2[$count],
                'tax_id' => $tax_id[$count],
                'total' => $total[$count],
            ]);
        }

        $purchaseFooter = PurchaseFooter::create([
            'purchase_master_id' => $purchaseMaster->id,
            'gross_value' => $request->gross_value,
            'discount_1_total' => $request->discount_1_total,
            'discount_2_total' => $request->discount_2_total,
            'tax_total' => $request->tax_total,
            'other_expenses' => $request->other_expenses,
            'extra_discount' => $request->extra_discount,
            'net_value' => $request->net_value,
            'remarks' => $request->remarks,
        ]);

        if ($purchaseMaster && $goodsMaster && $goodsDetail && $purchaseFooter){
            return response()->json(['status' => 1, 'message' => 'Purchase Invoice Added Successfully']);
        }
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
