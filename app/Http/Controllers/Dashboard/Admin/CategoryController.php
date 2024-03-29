<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access_category')->only('index');
        $this->middleware('permission:create_category')->only(['create', 'store']);
        $this->middleware('permission:update_category')->only(['edit', 'update']);
        $this->middleware('permission:delete_category')->only(['delete', 'delete-all']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("id", "desc")->get();
        return view("admin.pages.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.pages.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect_with_flash("msgSuccess", "Category created successfully", "categories");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.pages.categories.update", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all())->save();
        return redirect_with_flash("msgSuccess", "Category updated successfully", "categories");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect_with_flash("msgSuccess", "Category removed successfully", "categories");
    }

    /**
     * Remove all specified resource from storage.
     */
    public function delete_all()
    {
        $category_ids = json_decode(request()->ids, true);

        if (count($category_ids) > 0) {
            $categories = Category::whereIn("id", $category_ids);
            $categories->delete();

            return redirect_with_flash("msgSuccess", "Categories removed successfully", "categories");
        }

        return redirect_with_flash("msgDanger", "Please Select row to delete", "categories");
    }
}
