<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermissionRequest;
use App\Models\Permission;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access_permission', ['only' => 'index']);
        $this->middleware('permission:create_permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_permission', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', "desc")->get();

        return view("admin.pages.users.permissions.index", compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        Permission::create($request->all());

        return redirect_with_flash("msgSuccess", "Permissions created successfully", "permissions");
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view("admin.pages.users.permissions.update", compact("permission"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->fill($request->all())->save();

        return redirect_with_flash("msgSuccess", "Permissions updated successfully", "permissions");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect_with_flash("msgSuccess", "Permissions deleted successfully", "permissions");
    }
}
