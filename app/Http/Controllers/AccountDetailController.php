<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountDetailRequest;
use App\Models\AccountDetail;
use App\Models\Head;
use App\Models\SubHead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accountDetail.index');
    }

    public function fetchAccountDetails(){
        $accountDetails = AccountDetail::with('head', 'subHead')->get();
        return response()->json([
            'accountDetails' => $accountDetails,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountDetail = AccountDetail::latest()->first();
        if($accountDetail){
            $serial_number = $accountDetail->serial_number;
        }
        else{
            $serial_number = 0;
        }
        $heads = Head::all();
        return response()->json([
            'heads' => $heads,
            'serial_number' => $serial_number+1,
        ]);
    }

    public function fetchSubHeads($id){
        $head = Head::find($id);
        $subHeads = SubHead::where('head_id', $id)->get();
        if($subHeads){
            return response()->json([
                'status' => 1,
                'subHeads' => $subHeads,
                'head' => $head,
            ]);
        }
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Sub Heads not exist against this head',
            ]);
        }
    }

    public function fetchBoth($id){
        $subHead = SubHead::find($id);
        $heads = Head::all();
        if($subHead){
            return response()->json([
                'status' => 1,
                'subHead' => $subHead,
                'heads' => $heads,
            ]);
        }
        else{
            return response()->json([
                'status' => 0,
                'message' => 'Sub Heads not exist against this head',
            ]);
        }
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
            'head_id' => 'required',
            'sub_head_id' => 'required',
            'account_detail_name' => 'required',
            'account_nature' => 'required',
            'account_code' => 'required',
            'serial_number' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $accountDetail = AccountDetail::create($request->all());
        if ($accountDetail){
            return response()->json(['status' => 1, 'message' => 'Account Detail Added Successfully']);
        }

        /*if($request->account_nature == 4){
            return redirect(route('contact.create'));
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountDetail  $accountDetail
     * @return \Illuminate\Http\Response
     */
    public function show(AccountDetail $accountDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountDetail  $accountDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($accountDetail)
    {
        $accountDetail = AccountDetail::find($accountDetail);
        $account_nature = $accountDetail->getAttributes()['account_nature'];
        $heads = Head::all();
        $subHeads = SubHead::where('head_id', $accountDetail->head_id)->get();
        if ($accountDetail){
            return response()->json([
                'status' => 200,
                'heads' => $heads,
                'subHeads' => $subHeads,
                'accountDetail' => $accountDetail,
                'account_nature' => $account_nature,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'heads' => $heads,
                'subHeads' => $subHeads,
                'accountDetail' => 'Account Detail not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountDetail  $accountDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $accountDetail)
    {
        $validator = Validator::make($request->all(), [
            'head_id' => 'required',
            'sub_head_id' => 'required',
            'account_detail_name' => 'required',
            'account_nature' => 'required',
            'account_code' => 'required',
            'serial_number' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $accountDetail = AccountDetail::find($accountDetail);
        $accountDetail->update($request->all());
        if ($accountDetail){
            return response()->json(['status' => 1, 'message' => 'Account Detail Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountDetail  $accountDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($accountDetail)
    {
        $accountDetail = AccountDetail::find($accountDetail);
        if (!$accountDetail){
            return response()->json([
                'status' => 0,
                'message' => 'Account Detail not exist'
            ]);
        }
        $accountDetail->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Account Deleted Successfully'
        ]);
    }
}
