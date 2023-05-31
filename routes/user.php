<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\{
    FrontendController,
    ProfileController,
    SettingController,
    ToolController
};

Route::group(["middleware" => ["web", "auth", 'role:User']], function () {

    Route::get('/', [FrontendController::class, "home"])->name('frontend.home');

    Route::get('/history', [ToolController::class, "history"])->name('frontend.history');
    Route::get('/content/new', [ToolController::class, 'show_prompt_view'])->name("content.prompt.show");
    Route::post('/content-text/store', [ToolController::class, "store_content_text"])->name('textType.store');
    Route::get('/content/{id}/edit', [ToolController::class, "edit_content_text"])->name('content.edit');

    Route::post('/image/store', [ToolController::class, "store_content_image"])->name('imageType.store');
    Route::get('/image/{id}/edit', [ToolController::class, "edit_image"])->name('image.edit');

    Route::delete('/content/{id}/delete', [ToolController::class, "delete_content"])->name('content.destroy');
    Route::get('/content/delete/all', [ToolController::class, "delete_all"])->name('content.delete-all');

    Route::get('/test', [FrontendController::class, "store_content"]);
    // settings
    Route::get('/settings', [SettingController::class, "show_settings"])->name('frontend.user.show_settings');
    Route::put('/settings', [SettingController::class, "update_settings"])->name('frontend.user.update_settings');

    // user profile routes
    Route::get("profile", [ProfileController::class, 'show_profile'])->name('frontend.user.show_profile');
    Route::put("update-information", [ProfileController::class, 'update_information'])->name('frontend.user.update_information');
    Route::put("update-password", [ProfileController::class, 'update_password'])->name('frontend.user.update_password');
    Route::get("logout", [ProfileController::class, 'logout'])->name('frontend.user.logout');
});
