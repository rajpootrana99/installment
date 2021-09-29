<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', [
            'customers' => $customers,
        ]);
    }

    public function fetchCustomers(){
        $customers = Customer::all();
        return response()->json([
            'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create', [
            'customer' => new Customer(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer = Customer::create($request->all());
        $this->storeImage($customer);
        return redirect(route('customer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        $this->storeImage($customer);
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect(route('customer.index'));
    }

    public function storeImage($customer)
    {
        $customer->update([
            'image' => $this->imagePath('image', 'customer', $customer),
            'cnic_front' => $this->imagePath('cnic_front', 'customer', $customer),
            'cnic_back' => $this->imagePath('cnic_back', 'customer', $customer),
        ]);
    }
}
