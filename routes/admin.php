<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\EngineController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\PromptController;
use App\Http\Controllers\Dashboard\QuestionController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\ToneController;
use App\Http\Controllers\Dashboard\User\ProfileController;
use App\Http\Controllers\Dashboard\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
*/


Route::group(["middleware" => "web"], function () {
    Route::get('/', function () {
        return view("admin.pages.index");
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('tones', ToneController::class);
    Route::resource('engines', EngineController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('prompts', PromptController::class);

    // subscriptions
    Route::resource("subscriptions/plans", PlanController::class);

    // settings
    Route::get("settings/brand/{id}/edit", [SettingController::class,"brand_show"])->name('settings.brand_show');
    Route::put("settings/brand/{id}", [SettingController::class,"brand_update"])->name('settings.brand_update');
    Route::get("settings/third-parties/{id}/edit", [SettingController::class,"third_party_show"])->name('settings.third_party_show');
    Route::put("settings/third-parties/open-ai/{id}", [SettingController::class,"update_open_ai_key"])->name('settings.update_open_ai_key');
    Route::put("settings/third-parties/paypal/{id}", [SettingController::class,"update_paypal_settings"])->name('settings.update_paypal_settings');
    Route::get("settings/content/{id}/edit", [SettingController::class,"content_show"])->name('settings.content_show');
    Route::put("settings/content/{id}", [SettingController::class,"content_update"])->name('settings.content_update');

    // users
    Route::resource('users', UserController::class);

    // user profile routes
    Route::get("profile", [ProfileController::class, 'show_profile'])->name('user.show_profile');
    Route::put("update-information", [ProfileController::class, 'update_information'])->name('user.update_information');
    Route::put("update-password", [ProfileController::class, 'update_password'])->name('user.update_password');
    Route::get("logout", [ProfileController::class, 'logout'])->name('user.logout');
});
