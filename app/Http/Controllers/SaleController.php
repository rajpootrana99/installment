<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Guaranter;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Site;
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
        $sales = Sale::all();
        return view('sale.index', [
            'sales' => $sales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salesOfficers = Employee::where('type', '0')->get();
        $marketingOfficers = Employee::where('type', '1')->get();
        $inquiryOfficers = Employee::where('type', '2')->get();
        $recoveryOfficers = Employee::where('type', '3')->get();
        $customers = Customer::all();
        $items = Item::with('barcodes')->get();
        $guaranters = Guaranter::all();
        $sites = Site::all();
        return view('sale.create', [
            'salesOfficers' => $salesOfficers,
            'marketingOfficers' => $marketingOfficers,
            'inquiryOfficers' => $inquiryOfficers,
            'recoveryOfficers' => $recoveryOfficers,
            'customers' => $customers,
            'items' => $items,
            'guaranters' => $guaranters,
            'sites' => $sites,
        ]);
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
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        if ($customer){
            return response()->json([
                'status' => 1,
                'customer' => $customer,
            ]);
        }
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Not Found',
            ]);
        }
    }

    public function fetchItem($id){
        $item = Item::with('category', 'barcodes')->find($id);
        if ($item){
            return response()->json([
                'status' => 1,
                'item' => $item,
            ]);
        }
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Not Found',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
