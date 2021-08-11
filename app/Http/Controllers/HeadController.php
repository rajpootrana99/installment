<?php

namespace App\Http\Controllers;

use App\Http\Requests\HeadRequest;
use App\Models\Head;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('head.index');
    }

    public function fetchHeads(){
        $heads = Head::all();
        return response()->json([
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
        return response()->json([
            'status' => 1,
            'serial_code' => $serial_code+1,
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'serial_code' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $head = Head::create($request->all());
        if ($head){
            return response()->json(['status' => 1, 'message' => 'Head Added Successfully']);
        }
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
    public function edit($head)
    {
        $head = Head::find($head);
        if ($head){
            return response()->json([
                'status' => 200,
                'head' => $head,
            ]);
        }
        else {
            return response()->json([
                'status' => 404,
                'head' => 'Head Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Head  $head
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $head)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'serial_code' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $head = Head::find($head);
        $head->update($request->all());
        if ($head){
            return response()->json(['status' => 1, 'message' => 'Head Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Head  $head
     * @return \Illuminate\Http\Response
     */
    public function destroy($head)
    {
        $head = Head::find($head);
        if (!$head){
            return response()->json([
                'status' => 0,
                'message' => 'Head not exist'
            ]);
        }
        $head->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Head deleted Successfully'
        ]);
    }
}
