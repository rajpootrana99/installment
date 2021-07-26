<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarcodeRequest;
use App\Http\Requests\ItemRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Barcode;
use App\Models\Item;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barcodes = Barcode::with('item')->get();
        return view('barcode.index', [
            'barcodes' => $barcodes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('barcode.create', [
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarcodeRequest $request)
    {
        $barcode = Barcode::create($request->all());
        $this->storeImage($barcode);
        return redirect(route('barcode.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function show(Barcode $barcode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function edit(Barcode $barcode)
    {
        $items = Item::all();
        return view('barcode.edit', [
            'items' => $items,
            'barcode' => $barcode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function update(BarcodeRequest $request, Barcode $barcode)
    {
        $barcode->update($request->all());
        $this->storeImage($barcode);
        return redirect(route('barcode.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barcode  $barcode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barcode $barcode)
    {
        $barcode->delete();
        return redirect(route('barcode.index'));
    }

    public function storeImage($barcode)
    {
        $barcode->update([
            'barcode' => $this->imagePath('barcode', 'barcode', $barcode),
        ]);
    }
}
