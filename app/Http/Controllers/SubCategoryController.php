<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subCategory.index');
    }

    public function fetchSubCategories(){
        $subCategories = SubCategory::all();
        return response()->json([
            'subCategories' => $subCategories,
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
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $subCategory = SubCategory::create($request->all());
        if ($subCategory){
            return response()->json(['status' => 1, 'message' => 'Sub Category Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($subCategory)
    {
        $subCategory = SubCategory::find($subCategory);
        if ($subCategory){
            return response()->json([
                'status' => 200,
                'subCategory' => $subCategory,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Sub Category not found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subCategory)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $subCategory = SubCategory::find($subCategory);
        $subCategory->update($request->all());
        if ($subCategory){
            return response()->json(['status' => 1, 'message' => 'Sub Category Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($subCategory)
    {
        $subCategory = SubCategory::find($subCategory);
        if (!$subCategory){
            return response()->json([
                'status' => 0,
                'message' => 'Sub Category not exist'
            ]);
        }
        $subCategory->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Sub Category deleted successfully'
        ]);
    }
}
