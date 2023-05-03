<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\EngineController;
use App\Http\Controllers\Dashboard\LanguageController;
use App\Http\Controllers\Dashboard\PlanController;
use App\Http\Controllers\Dashboard\PromptController;
use App\Http\Controllers\Dashboard\QuestionController;
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
    Route::resource("plans", PlanController::class);

    // users
    Route::resource('users', UserController::class);

    // user profile routes
    Route::get("profile", [ProfileController::class, 'show_profile'])->name('user.show_profile');
    Route::put("update-information", [ProfileController::class, 'update_information'])->name('user.update_information');
    Route::put("update-password", [ProfileController::class, 'update_password'])->name('user.update_password');
    Route::get("logout", [ProfileController::class, 'logout'])->name('user.logout');
});
