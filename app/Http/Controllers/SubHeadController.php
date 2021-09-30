<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubHeadRequest;
use App\Models\Head;
use App\Models\SubHead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subHead.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetchSubHeads(){
        $subHeads = SubHead::with('head')->get();
        return response()->json([
            'subHeads' => $subHeads,
        ]);
    }
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
        return response()->json([
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'serial_code' => 'required',
            'head_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $subHead = SubHead::create($request->all());
        if ($subHead){
            return response()->json(['status' => 1, 'message' => 'Sub Head Added Successfully']);
        }
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
    public function edit($subHead)
    {
        $heads = Head::all();
        $subHead = SubHead::find($subHead);
        if ($subHead){
            return response()->json([
                'status' => 200,
                'subHead' => $subHead,
                'heads' => $heads,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'subHead' => 'Sub Head Not Found',
                'heads' => $heads,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subHead)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'serial_code' => 'required',
            'head_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $subHead = SubHead::find($subHead);
        $subHead->update($request->all());
        if ($subHead){
            return response()->json(['status' => 1, 'message' => 'Sub Head Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubHead  $subHead
     * @return \Illuminate\Http\Response
     */
    public function destroy($subHead)
    {
        $subHead = SubHead::find($subHead);
        if(!$subHead){
            return response()->json([
                'status' => 0,
                'message' => 'Sub Head not exist'
            ]);
        }
        $subHead->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Sub Head Deleted Successfully'
        ]);
    }
}
