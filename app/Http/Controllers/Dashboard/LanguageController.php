<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Models\Language;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::orderBy('id', "desc")->get();
        return view('admin.pages.languages.index', compact("languages"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {
        Language::create($request->all());
        return redirect_with_flash("msgSuccess", "Language created successfully", "languages");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view("admin.pages.languages.update", compact("language"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request, Language $language)
    {
        $language->fill($request->all())->save();
        return redirect_with_flash("msgSuccess", "Language updated successfully", "languages");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect_with_flash("msgSuccess", "Language deleted successfully", "languages");
    }
}
