<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Models\Area;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('route.index');
    }

    public function fetchRoutes(){
        $routes = Route::with('areas');
        return response()->json([
            'routes' => $routes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return response()->json([
            'areas' => $areas,
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
            'area_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $route = Route::create([
            'name' => $request->name,
        ]);
        $route->areas()->attach($request->area_id);
        if ($route){
            return response()->json(['status' => 1, 'message' => 'Route added successfully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit($route)
    {
        $areas = Area::all();
        $route = Route::find($route);
        if ($route){
            return response()->json([
                'status' => 200,
                'areas' => $areas,
                'route' => $route,
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'areas' => $areas,
                'message' => 'Route not found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $route)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'area_id' => 'required',
        ]);
        if (!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }
        $route = Route::find($route);
        $route->update([
            'name' => $request->name,
        ]);
        $route->areas()->detach();
        $route->areas()->attach($request->area_id);
        if ($route){
            return response()->json(['status' => 1, 'message' => 'Route updated successfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy($route)
    {
        $route = Route::find($route);
        if (!$route){
            return response()->json([
                'status' => 0,
                'message' => 'Route not found',
            ]);
        }
        $route->delete();
        $route->areas()->detach();
        return response()->json([
            'status' => 0,
            'message' => 'Route deleted successfully',
        ]);
    }
}
