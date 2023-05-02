<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("admin.pages.categories.index", compact("categories"));
    }

    public function create()
    {
        return view("admin.pages.categories.create");
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect_with_flash("msgSuccess", "Category created successfully", "categories");
    }

    public function edit(Category $category)
    {
        return view("admin.pages.categories.update", compact("category"));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all())->save();
        return redirect_with_flash("msgSuccess", "Category updated successfully", "categories");
    }

    public function destroy(){
        dd('fdfd');
    }
}
