<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeadRequest;
use App\Models\Head;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heads = Head::all();
        return view('head.index', [
            'heads' => $heads,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $head = Head::latest()->first();
        if ($head){
            $serial_code = $head->serial_code;
        }
        else{
            $serial_code = 0;
        }
        return view('head.create', [
            'serial_code' => $serial_code+1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HeadRequest $request)
    {
        Head::create($request->all());
        return redirect(route('head.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Head  $head
     * @return \Illuminate\Http\Response
     */
    public function show(Head $head)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Head  $head
     * @return \Illuminate\Http\Response
     */
    public function edit(Head $head)
    {
        return view('head.edit', [
            'head' => $head,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Head  $head
     * @return \Illuminate\Http\Response
     */
    public function update(HeadRequest $request, Head $head)
    {
        $head->update($request->all());
        return redirect(route('head.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Head  $head
     * @return \Illuminate\Http\Response
     */
    public function destroy(Head $head)
    {
        $head->delete();
        return redirect(route('head.index'));
    }
}
