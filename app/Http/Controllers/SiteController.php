<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Company;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.index');
    }

    public function fetchSites(){
        $sites = Site::with('company')->get();
        return response()->json([
            'sites' => $sites,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return response()->json([
            'companies' => $companies,
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
            'company_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $site = Site::create($request->all());
        if ($site){
            return response()->json(['status' => 1, 'message' => 'Site added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit($site)
    {
        $site = Site::find($site);
        $companies = Company::all();
        if ($site){
            return response()->json([
                'status' => 200,
                'site' => $site,
                'companies' => $companies,
            ]);
        }
        else{
            return response()->json([
                'status' => 200,
                'message' => 'Site not found',
                'companies' => $companies,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $site)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'company_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $site = Site::find($site);
        $site->update($request->all());
        if ($site){
            return response()->json(['status' => 1, 'message' => 'Site Updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy($site)
    {
        $site = Site::find($site);
        if (!$site){
            return response()->json(['status' => 0, 'message' => 'Site not found']);
        }
        $site->delete();
        return response()->json(['status' => 1, 'message' => 'Site deleted successfully']);
    }
}
