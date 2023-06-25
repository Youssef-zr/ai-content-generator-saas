<?php

use App\Models\Front\Design;
use Illuminate\Support\Facades\{
    Auth,
    Route,
};
use App\Models\{
    Block,
    Partner,
    Plan,
    Prompt,
    Setting,
    Category
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $plans = Plan::get();
    $blocks = Block::get();
    $site = Design::first();
    $setting = Setting::first();
    $partners = Partner::pluck("logo")->toArray();

    $tools = Category::orderBy("id", "desc")->pluck('title')->toArray();
    $prompts = Prompt::orderBy("id", "desc")->limit(5)->pluck('title')->toArray();

    return view(
        "user.site.index",
        compact('plans', 'site', 'partners', 'setting', 'tools', 'prompts', 'blocks')
    );
});

Route::group(["middleware" => "auth"], function () {
    // user routes
    Route::get("profile", [ProfileController::class, 'show_profile'])->name('user.show_profile');
    Route::put("update-information", [ProfileController::class, 'update_information'])->name('user.update_information');
    Route::put("update-password", [ProfileController::class, 'update_password'])->name('user.update_password');
    Route::get("logout", [ProfileController::class, 'logout'])->name('user.logout');
});

Auth::routes();
