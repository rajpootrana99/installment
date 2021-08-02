<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuaranterRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Guaranter;
use Illuminate\Http\Request;

class GuaranterController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guaranters = Guaranter::all();
        return view('guaranter.index', [
            'guaranters' => $guaranters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guaranter.create', [
            'guaranter' => new Guaranter(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuaranterRequest $request)
    {
        $guaranter = Guaranter::create($request->all());
        $this->storeImage($guaranter);
        return redirect(route('guaranter.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guaranter  $guaranter
     * @return \Illuminate\Http\Response
     */
    public function show(Guaranter $guaranter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guaranter  $guaranter
     * @return \Illuminate\Http\Response
     */
    public function edit(Guaranter $guaranter)
    {
        return view('guaranter.edit', [
            'guaranter' => $guaranter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guaranter  $guaranter
     * @return \Illuminate\Http\Response
     */
    public function update(GuaranterRequest $request, Guaranter $guaranter)
    {
        $guaranter->update($request->all());
        return redirect(route('guaranter.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guaranter  $guaranter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guaranter $guaranter)
    {
        $guaranter->delete();
        return redirect(route('guaranter.index'));
    }

    public function storeImage($guaranter)
    {
        $guaranter->update([
            'image' => $this->imagePath('image', 'guaranter', $guaranter),
            'cnic_front' => $this->imagePath('cnic_front', 'guaranter', $guaranter),
            'cnic_back' => $this->imagePath('cnic_back', 'guaranter', $guaranter),
        ]);
    }
}
