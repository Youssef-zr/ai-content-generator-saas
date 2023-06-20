<?php

namespace App\Http\Controllers\Dashboard\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access_role', ['only' => 'index']);
        $this->middleware('permission:create_role', ['only' => ['create', 'store']]);
        $this->middleware('permission:update_role', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_role', ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('id', "desc")->get();

        return view("admin.pages.users.roles.index", compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::pluck('name', "id")->toArray();

        return view('admin.pages.users.roles.create', compact("permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $data = $request->except("permissions");
        $permissions = $request->permissions;

        $newRole = Role::create($data);
        $newRole->givePermissions($permissions);

        return redirect_with_flash("msgSuccess", "Role created successfully", "roles");
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::pluck('name', "id")->toArray();

        return view('admin.pages.users.roles.update', compact("role", "permissions"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $data = $request->except("permissions");
        $permissions = $request->permissions;

        $role->fill($data)->save();
        $role->syncPermissions($permissions);

        return redirect_with_flash("msgSuccess", "Role Updated Successfully", "roles");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $authUserRole = auth()->user()->roles->pluck("name")->toArray();
        if (array_intersect($authUserRole, ["Admin"]) and auth()->id() != 1) {
            return redirect_with_flash("msgDanger", "Cant Remove Administrator permission", "roles");
        }

        $role->delete();

        return redirect_with_flash("msgSuccess", "Role deleted Successfully", "roles");
    }
}
