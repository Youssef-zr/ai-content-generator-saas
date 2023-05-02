<?php

use App\Http\Controllers\Dashboard\CategoryController;
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
});
