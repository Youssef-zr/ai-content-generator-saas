<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\{
    Role,
    User,
};

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderby('id', "desc")->get();

        return view("admin.pages.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', "id")->toArray();

        return view("admin.pages.users.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $data = $request->except(["roles", "password"]);
        $data['password'] = bcrypt($request->password);
        $roles = $request->roles;

        $newUser = User::create($data);
        $newUser->syncRoles($roles);

        return redirect_with_flash("msgSuccess", "User created successfully", "users");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', "id")->toArray();

        return view("admin.pages.users.update", compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->except(["roles", "password"]);
        $data['password'] = bcrypt($request->password);
        $roles = $request->roles;

        $user->fill($data)->save();
        $user->syncRoles($roles);

        return redirect_with_flash("msgSuccess", "user Updated Successfully", "users");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect_with_flash("msgSuccess", "User deleted successfully", "users");
    }
}
