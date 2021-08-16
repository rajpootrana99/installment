<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Traits\GeneralTrait;
use App\Models\Category;
use App\Models\Item;
use App\Models\Manufacturer;
use App\Models\SubCategory;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('item.index');
    }

    public function fetchItems(){
        $items = Item::with('category', 'subCategory', 'manufacturer')->get();
        return response()->json([
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $manufacturers = Manufacturer::all();
        $warehouses = Warehouse::all();
        return response()->json([
            'categories' => $categories,
            'warehouses' => $warehouses,
            'subCategories' => $subCategories,
            'manufacturers' => $manufacturers,
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
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'manufacturer_id' => 'required',
            'warehouse_id' => 'required',
            'item_code' => 'required',
            'name' => 'required',
            'cost_price' => 'required',
            'purchase_price' => 'required',
            'company_price' => 'required',
            'is_sale_price_defined' => 'required',
            'sale_price_1' => 'required',
            'sale_price_2' => 'required',
            'sale_price_3' => 'required',
            'sale_price_4' => 'required',
            'sale_price_5' => 'required',
            'remarks' => 'required',
            'description' => 'required',
            'image' => 'required|file|image',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        if ($request->sale_price_format == 1){
            if($request->is_sale_price_defined == 0){
                $sale_price_1 = (($request->sale_price_1/$request->purchase_price) * 100) - 100;
                $sale_price_2 = (($request->sale_price_2/$request->purchase_price) * 100) - 100;
                $sale_price_3 = (($request->sale_price_3/$request->purchase_price) * 100) - 100;
                $sale_price_4 = (($request->sale_price_4/$request->purchase_price) * 100) - 100;
                $sale_price_5 = (($request->sale_price_5/$request->purchase_price) * 100) - 100;
            }
            else{
                $sale_price_1 = (($request->sale_price_1/$request->company_price) * 100) - 100;
                $sale_price_2 = (($request->sale_price_2/$request->company_price) * 100) - 100;
                $sale_price_3 = (($request->sale_price_3/$request->company_price) * 100) - 100;
                $sale_price_4 = (($request->sale_price_4/$request->company_price) * 100) - 100;
                $sale_price_5 = (($request->sale_price_5/$request->company_price) * 100) - 100;
            }
        }
        else{
            $sale_price_1 = $request->sale_price_1;
            $sale_price_2 = $request->sale_price_2;
            $sale_price_3 = $request->sale_price_3;
            $sale_price_4 = $request->sale_price_4;
            $sale_price_5 = $request->sale_price_5;
        }

        $item = Item::create([
            'item_code' => $request->item_code,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'manufacturer_id' => $request->manufacturer_id,
            'warehouse_id' => $request->warehouse_id,
            'cost_price' => $request->cost_price,
            'purchase_price' => $request->purchase_price,
            'company_price' => $request->company_price,
            'is_sale_price_defined' => $request->is_sale_price_defined,
            'remarks' => $request->remarks,
            'description' => $request->description,
            'sale_price_1' => $sale_price_1,
            'sale_price_2' => $sale_price_2,
            'sale_price_3' => $sale_price_3,
            'sale_price_4' => $sale_price_4,
            'sale_price_5' => $sale_price_5,
            'status' => $request->status,
        ]);
        $this->storeImage($item);
        if ($item){
            return response()->json(['status' => 1, 'message' => 'Item Added Successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        $item = Item::find($item);
        $is_sale_price_defined = $item->getAttributes()['is_sale_price_defined'];
        $status = $item->getAttributes()['status'];
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $manufacturers = Manufacturer::all();
        $warehouses = Warehouse::all();
        if ($item){
            return response()->json([
                'status' => 200,
                'categories' => $categories,
                'subCategories' => $subCategories,
                'manufacturers' => $manufacturers,
                'warehouses' => $warehouses,
                'is_sale_price_defined' => $is_sale_price_defined,
                'status' => $status,
                'item' => $item,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'categories' => $categories,
                'subCategories' => $subCategories,
                'manufacturers' => $manufacturers,
                'warehouses' => $warehouses,
                'item' => 'Item not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'manufacturer_id' => 'required',
            'warehouse_id' => 'required',
            'item_code' => 'required',
            'name' => 'required',
            'cost_price' => 'required',
            'purchase_price' => 'required',
            'company_price' => 'required',
            'is_sale_price_defined' => 'required',
            'sale_price_1' => 'required',
            'sale_price_2' => 'required',
            'sale_price_3' => 'required',
            'sale_price_4' => 'required',
            'sale_price_5' => 'required',
            'remarks' => 'required',
            'description' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }

        if ($request->sale_price_format == 1){
            if($request->is_sale_price_defined == 0){
                $sale_price_1 = (($request->sale_price_1/$request->purchase_price) * 100) - 100;
                $sale_price_2 = (($request->sale_price_2/$request->purchase_price) * 100) - 100;
                $sale_price_3 = (($request->sale_price_3/$request->purchase_price) * 100) - 100;
                $sale_price_4 = (($request->sale_price_4/$request->purchase_price) * 100) - 100;
                $sale_price_5 = (($request->sale_price_5/$request->purchase_price) * 100) - 100;
            }
            else{
                $sale_price_1 = (($request->sale_price_1/$request->company_price) * 100) - 100;
                $sale_price_2 = (($request->sale_price_2/$request->company_price) * 100) - 100;
                $sale_price_3 = (($request->sale_price_3/$request->company_price) * 100) - 100;
                $sale_price_4 = (($request->sale_price_4/$request->company_price) * 100) - 100;
                $sale_price_5 = (($request->sale_price_5/$request->company_price) * 100) - 100;
            }
        }
        else{
            $sale_price_1 = $request->sale_price_1;
            $sale_price_2 = $request->sale_price_2;
            $sale_price_3 = $request->sale_price_3;
            $sale_price_4 = $request->sale_price_4;
            $sale_price_5 = $request->sale_price_5;
        }
        $item = Item::find($item);
        $item->update([
            'item_code' => $request->item_code,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'manufacturer_id' => $request->manufacturer_id,
            'warehouse_id' => $request->warehouse_id,
            'cost_price' => $request->cost_price,
            'purchase_price' => $request->purchase_price,
            'company_price' => $request->company_price,
            'is_sale_price_defined' => $request->is_sale_price_defined,
            'remarks' => $request->remarks,
            'description' => $request->description,
            'sale_price_1' => $sale_price_1,
            'sale_price_2' => $sale_price_2,
            'sale_price_3' => $sale_price_3,
            'sale_price_4' => $sale_price_4,
            'sale_price_5' => $sale_price_5,
            'status' => $request->status,
        ]);
        $this->storeImage($item);
        if ($item){
            return response()->json(['status' => 1, 'message' => 'Item Updated Successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($item)
    {
        $item = Item::find($item);
        if (!$item){
            return response()->json([
                'status' => 0,
                'message' => 'Item not exist'
            ]);
        }
        $item->delete();
        return response()->json([
            'status' => 1,
            'message' => 'Item Deleted Successfully'
        ]);
    }

    public function storeImage($item)
    {
        $item->update([
            'image' => $this->imagePath('image', 'item', $item),
        ]);
    }
}
