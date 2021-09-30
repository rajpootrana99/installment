<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuaranterRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Guaranter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        return view('guaranter.index');
    }

    public function fetchGuaranters(){
        $guaranters = Guaranter::all();
        return response()->json([
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
            'father_name' => 'required',
            'marital_status' => 'required',
            'phone' => 'required',
            'cnic' => 'required',
            'monthly_income' => 'required',
            'residential_address' => 'required',
            'office_address' => 'required',
            'occupation' => 'required',
            'designation' => 'required',
            'work_since' => 'required',
            'cnic_front' => 'sometimes|file|image',
            'cnic_back' => 'sometimes|file|image',
            'image' => 'sometimes|file|image',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        $guaranter = Guaranter::create($request->all());
        $this->storeImage($guaranter);
        if ($guaranter){
            return response()->json(['status' => 1, 'message' => 'Guaranter Added Successfully']);
        }
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
    public function edit($guaranter)
    {
        $guaranter = Guaranter::find($guaranter);
        $marital_status = $guaranter->getAttributes()['marital_status'];
        if ($guaranter){
            return response()->json([
                'status' => 200,
                'guaranter' => $guaranter,
                'marital_status' => $marital_status,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Guaranter not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guaranter  $guaranter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $guaranter)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'marital_status' => 'required',
            'phone' => 'required',
            'cnic' => 'required',
            'monthly_income' => 'required',
            'residential_address' => 'required',
            'office_address' => 'required',
            'occupation' => 'required',
            'designation' => 'required',
            'work_since' => 'required',
            'cnic_front' => 'sometimes|file|image',
            'cnic_back' => 'sometimes|file|image',
            'image' => 'sometimes|file|image',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $guaranter = Guaranter::find($guaranter);
        $guaranter->update($request->all());
        $this->storeImage($guaranter);
        if ($guaranter){
            return response()->json(['status' => 1, 'message' => 'Guaranter Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guaranter  $guaranter
     * @return \Illuminate\Http\Response
     */
    public function destroy($guaranter)
    {
        $guaranter = Guaranter::find($guaranter);
        if (!$guaranter){
            return response()->json([
                'status' => 0,
                'message' => 'Guaranter not exist'
            ]);
        }
        $guaranter->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Guaranter Deleted Successfully'
        ]);
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
