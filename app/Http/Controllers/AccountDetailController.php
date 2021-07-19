<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountDetailRequest;
use App\Models\AccountDetail;
use App\Models\Head;
use App\Models\SubHead;
use Illuminate\Http\Request;

class AccountDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountDetails = AccountDetail::with('head', 'subHead')->get();
        return view('accountDetail.index', [
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
            $accountCode = $accountDetail->account_code;
        }
        else{
            $accountCode = 0;
        }
        $heads = Head::all();
        $subHeads = SubHead::all();
        return view('accountDetail.create', [
            'heads' => $heads,
            'subHeads' => $subHeads,
            'accountCode' => $accountCode+1,
            'accountDetail' => new AccountDetail(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountDetailRequest $request)
    {
        $head_serial_code = Head::where('id', $request->head_id)->first();
        $sub_head_serial_code = SubHead::where('id', $request->sub_head_id)->first();
        $account_code = $head_serial_code->serial_code.$sub_head_serial_code->serial_code.$request->account_code;
        AccountDetail::create([
            'head_id' => $request->head_id,
            'sub_head_id' => $request->sub_head_id,
            'account_detail_name' => $request->account_detail_name,
            'account_nature' => $request->account_nature,
            'account_code' => $account_code,
        ]);
        return redirect(route('accountDetail.index'));
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
    public function edit(AccountDetail $accountDetail)
    {
        $heads = Head::all();
        $subHeads = SubHead::all();
        return view('accountDetail.edit', [
            'heads' => $heads,
            'subHeads' => $subHeads,
            'accountDetail' => $accountDetail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountDetail  $accountDetail
     * @return \Illuminate\Http\Response
     */
    public function update(AccountDetailRequest $request, AccountDetail $accountDetail)
    {
        $accountDetail->update($request->all());
        return redirect(route('accountDetail.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountDetail  $accountDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountDetail $accountDetail)
    {
        //
    }
}
