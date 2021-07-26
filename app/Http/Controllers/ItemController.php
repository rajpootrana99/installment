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
        $items = Item::with('category', 'subCategory', 'manufacturer')->get();
        return view('item.index', [
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
        return view('item.create', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'manufacturers' => $manufacturers,
            'warehouses' => $warehouses,
            'item' => new Item(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        if($request->is_sale_price_defined == 0){
            $sale_price_1 = $request->purchase_price + ($request->sale_price_1/100)*$request->purchase_price;
            $sale_price_2 = $request->purchase_price + ($request->sale_price_2/100)*$request->purchase_price;
            $sale_price_3 = $request->purchase_price + ($request->sale_price_3/100)*$request->purchase_price;
            $sale_price_4 = $request->purchase_price + ($request->sale_price_4/100)*$request->purchase_price;
            $sale_price_5 = $request->purchase_price + ($request->sale_price_5/100)*$request->purchase_price;
        }
        else{
            $sale_price_1 = $request->company_price + ($request->sale_price_1/100)*$request->company_price;
            $sale_price_2 = $request->company_price + ($request->sale_price_2/100)*$request->company_price;
            $sale_price_3 = $request->company_price + ($request->sale_price_3/100)*$request->company_price;
            $sale_price_4 = $request->company_price + ($request->sale_price_4/100)*$request->company_price;
            $sale_price_5 = $request->company_price + ($request->sale_price_5/100)*$request->company_price;
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
        ]);
        $this->storeImage($item);
        return redirect(route('item.index'));
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
    public function edit(Item $item)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $manufacturers = Manufacturer::all();
        $warehouses = Warehouse::all();
        return view('item.edit', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'manufacturers' => $manufacturers,
            'warehouses' => $warehouses,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        if($request->is_sale_price_defined == 0){
            $sale_price_1 = $request->purchase_price + ($request->sale_price_1/100)*$request->purchase_price;
            $sale_price_2 = $request->purchase_price + ($request->sale_price_2/100)*$request->purchase_price;
            $sale_price_3 = $request->purchase_price + ($request->sale_price_3/100)*$request->purchase_price;
            $sale_price_4 = $request->purchase_price + ($request->sale_price_4/100)*$request->purchase_price;
            $sale_price_5 = $request->purchase_price + ($request->sale_price_5/100)*$request->purchase_price;
        }
        else{
            $sale_price_1 = $request->company_price + ($request->sale_price_1/100)*$request->company_price;
            $sale_price_2 = $request->company_price + ($request->sale_price_2/100)*$request->company_price;
            $sale_price_3 = $request->company_price + ($request->sale_price_3/100)*$request->company_price;
            $sale_price_4 = $request->company_price + ($request->sale_price_4/100)*$request->company_price;
            $sale_price_5 = $request->company_price + ($request->sale_price_5/100)*$request->company_price;
        }
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
        ]);
        $this->storeImage($item);
        return redirect(route('item.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect(route('item.index'));
    }

    public function storeImage($item)
    {
        $item->update([
            'image' => $this->imagePath('image', 'item', $item),
        ]);
    }
}
