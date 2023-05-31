<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\UploadFiles;
use App\Http\Requests\User\{
    UserPasswordRequest,
    UserProfileRequest
};
use Illuminate\Support\Facades\{
    Auth,
    Hash
};

class ProfileController extends Controller
{
    use UploadFiles;

    // show user profile information
    public function show_profile()
    {
        $auth_user = Auth::user();
        return view("frontend.pages.user.profile", compact("auth_user"));
    }

    // update user profile information
    public function update_information(UserProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->except(["image"]);
        $user->fill($data)->save();

        $this->update_user_avatar($user);

        return redirect_with_flash("msgSuccess", "Your Information Was Updated Successfully", 'profile', 'false');
    }

    // update user password
    public function update_password(UserPasswordRequest $request)
    {
        $user = Auth::user();
        $password = Hash::make($request->password);
        $user->fill([
            "password" => $password
        ])->save();

        return redirect_with_flash("msgSuccess", "Your Password Was Updated Successfully", 'profile', "false");
    }

    // log out
    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }

    // update user profile avatar image
    public function update_user_avatar($user)
    {
        if (request()->hasFile("image")) {

            $photo = request()->file('image');
            $storagePath = "assets/dist/storage/users/";
            $oldFile = $user->image;
            $default = $oldFile;

            $imgProp = [
                'file' => $photo, "storagePath" => $storagePath,
                "old_image" => $oldFile, "default" => $default,
                "width" => 90, "height" => 90, "quality" => 96
            ];

            $fileInformation = UploadFiles::updateFile($imgProp);
            $user->fill(['image' => $fileInformation['file_path']])->save();
        }
    }
}
