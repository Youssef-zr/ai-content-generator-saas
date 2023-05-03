<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserPasswordRequest;
use App\Http\Requests\User\UserProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // show user profile information
    public function show_profile()
    {
        $auth_user = Auth::user();
        return view("admin.pages.users.user.profile", compact("auth_user"));
    }

    // update user profile information
    public function update_information(UserProfileRequest $request)
    {
        $user = Auth::user();
        $user->fill($request->all())->save();

        return redirect_with_flash("msgSuccess", "Your Information Was Updated Successfully", 'profile');
    }

    // update user password
    public function update_password(UserPasswordRequest $request)
    {
        $user = Auth::user();
        $password = Hash::make($request->password);
        $user->fill([
            "password" => $password
        ])->save();

        return redirect_with_flash("msgSuccess", "Your Password Was Updated Successfully", 'profile');
    }

    // log out
    public function logout()
    {
        Auth::logout();

        return redirect(url('login'));
    }
}
