<?php

namespace App\Http\Controllers;

use App\Http\Requests\RouteRequest;
use App\Models\Area;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::with('areas')->get();
        return view('route.index', [
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
        return view('route.create', [
            'areas' => $areas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {
        $route = Route::create([
            'name' => $request->name,
        ]);
        $route->areas()->attach($request->area_id);
        return redirect(route('route.index'));
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
    public function edit(Route $route)
    {
        $areas = Area::all();
        return view('route.edit', [
            'areas' => $areas,
            'route' => $route,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(RouteRequest $request, Route $route)
    {
        $route->update([
            'name' => $request->name,
        ]);
        $route->areas()->detach();
        $route->areas()->attach($request->area_id);
        return redirect(route('route.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $route->delete();
        $route->areas()->detach();
        return redirect(route('route.index'));
    }
}
