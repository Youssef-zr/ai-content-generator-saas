<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Front\Settings;
use App\Models\Language;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function show_settings()
    {
        $languages = Language::pluck('language', "id")->toArray();
        $userDefaultLang = auth()->user()->settings;

        return view("frontend.pages.user.settings", compact("languages", "userDefaultLang"));
    }
    public function update_settings(Request $request)
    {
        $user = auth()->user();
        $setting = Settings::where('user_id', $user->id)->first();

        $setting->fill($request->all())->save();

        return redirect_with_flash("msgSuccess", "Settings Updated Successfully", "settings", "false");
    }
}
