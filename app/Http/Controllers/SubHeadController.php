<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubHeadRequest;
use App\Models\Head;
use App\Models\SubHead;
use Illuminate\Http\Request;

class SubHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subHeads = SubHead::with('head')->get();
        return view('subHead.index', [
            'subHeads' => $subHeads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subHead = SubHead::latest()->first();
        if ($subHead){
            $serial_code = $subHead->serial_code;
        }
        else{
            $serial_code = 0;
        }
        $heads = Head::all();
        return view('subHead.create', [
            'heads' => $heads,
            'serial_code' => $serial_code+1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubHeadRequest $request)
    {
        SubHead::create($request->all());
        return redirect(route('subHead.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function show(SubHead $subHead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function edit(SubHead $subHead)
    {
        $heads = Head::all();
        return view('subHead.edit', [
            'subHead' => $subHead,
            'heads' => $heads,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function update(SubHeadRequest $request, SubHead $subHead)
    {
        $subHead->update($request->all());
        return redirect(route('subHead.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubHead $subHead)
    {
        $subHead->delete();
        return redirect(route('subHead.index'));
    }
}
