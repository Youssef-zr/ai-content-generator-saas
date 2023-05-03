<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EngineRequest;
use App\Models\Engine;

class EngineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $engines = Engine::orderBy('id', "desc")->get();
        return view("admin.pages.engines.index", compact("engines"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.engines.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EngineRequest $request)
    {
        Engine::create($request->all());
        return redirect_with_flash("msgSuccess", "Engine created successfully", "engines");
    }

    /**
     * Display the specified resource.
     */
    public function show(Engine $engine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Engine $engine)
    {
        return view("admin.pages.engines.update", compact("engine"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EngineRequest $request, Engine $engine)
    {
        $engine->fill($request->all())->save();
        return redirect_with_flash("msgSuccess", "Engine updated successfully", "engines");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Engine $engine)
    {
        $engine->delete();
        return redirect_with_flash("msgSuccess", "Engine deleted successfully", "engines");
    }
}
