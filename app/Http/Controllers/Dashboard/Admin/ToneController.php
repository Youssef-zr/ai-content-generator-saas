<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToneRequest;
use App\Models\Tone;

class ToneController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access_tone', ['only' => 'index']);
        $this->middleware('permission:create_tone', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_tone', ['only' => ['edit', 'update']]);
        $this->middleware('permission:read_tone', ['only' => 'show']);
        $this->middleware('permission:delete_tone', ['only' => ['delete', 'delete-all']]);
    }

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
        return view("admin.pages.tones.show", compact("tone"));
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

    /**
     * Remove all specified resource from storage.
     */
    public function delete_all()
    {
        $tones_ids = json_decode(request()->ids, true);

        if (count($tones_ids) > 0) {
            $tones = Tone::whereIn("id", $tones_ids);
            $tones->delete();

            return redirect_with_flash("msgSuccess", "Tones removed successfully", "tones");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "tones");
    }
}
