<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('vendor.index', [
            'vendors' => $vendors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create', [
            'vendor' => new Vendor(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        $vendor = Vendor::create($request->all());
        $this->storeImage($vendor);
        return redirect(route('vendor.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', [
            'vendor' => $vendor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());
        $this->storeImage($vendor);
        return redirect(route('vendor.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect(route('vendor.index'));
    }

    public function storeImage($vendor)
    {
        $vendor->update([
            'image' => $this->imagePath('image', 'vendor', $vendor),
            'cnic_front' => $this->imagePath('cnic_front', 'vendor', $vendor),
            'cnic_back' => $this->imagePath('cnic_back', 'vendor', $vendor),
        ]);
    }
}
