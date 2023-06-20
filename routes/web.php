<?php

use App\Models\Front\Design;
use App\Models\{
    Block,
    Partner,
    Plan,
    Prompt,
    Setting,
    Category
};

use Illuminate\Support\Facades\{
    Auth,
    Route,
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

    // dd($site);
    // dd($blocks);
    // dd($plans);
    // dd($prompts);
    // dd($tools);
    // dd($setting);

    return view(
        "frontend.site.index",
        compact('plans', 'site', 'partners', 'setting', 'tools', 'prompts', 'blocks')
    );
});

Auth::routes();
