<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToneRequest;
use App\Models\Tone;

class ToneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tones = Tone::orderBy("id", "desc")->get();
        return view('admin.pages.tones.index', compact("tones"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.tones.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ToneRequest $request)
    {
        Tone::create($request->all());
        return redirect_with_flash("msgSuccess", "Tone created successfully", "tones");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tone $tone)
    {
        return view("admin.pages.tones.show",compact("tone"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tone $tone)
    {
        return view("admin.pages.tones.update", compact("tone"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ToneRequest $request, Tone $tone)
    {
        $tone->fill($request->all());
        return redirect_with_flash("msgSuccess", "Tone updated successfully", "tones");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tone $tone)
    {
        $tone->delete();
        return redirect_with_flash("msgSuccess", "Tone deleted successfully", "tones");
    }
}
