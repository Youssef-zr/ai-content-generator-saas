<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\User\{
    DashboardController,
    SubscriptionController,
    SettingController,
    ToolController
};

Route::group(["middleware" => ["web", "auth", 'role:User']], function () {

    Route::get('/', [DashboardController::class, "home"])->name('user.home');

    Route::get('/history', [ToolController::class, "history"])->name('user.history');
    Route::get('/content/new', [ToolController::class, 'show_prompt_view'])->name("content.prompt.show");
    Route::post('/content-text/store', [ToolController::class, "store_content_text"])->name('textType.store');
    Route::get('/content/{id}/edit', [ToolController::class, "edit_content_text"])->name('content.edit');

    Route::post('/image/store', [ToolController::class, "store_content_image"])->name('imageType.store');
    Route::get('/image/{id}/edit', [ToolController::class, "edit_image"])->name('image.edit');

    Route::delete('/content/{id}/delete', [ToolController::class, "delete_content"])->name('content.destroy');
    Route::get('/content/delete/all', [ToolController::class, "delete_all"])->name('content.delete-all');

    Route::get('/test', [DashboardController::class, "store_content"]);

    // settings
    Route::get('/settings', [SettingController::class, "show_settings"])->name('user.show_settings');
    Route::put('/settings', [SettingController::class, "update_settings"])->name('user.update_settings');

    // user subscription
    Route::get('subscription', [SubscriptionController::class, 'subscription'])->name('user.subscription');

    // user payments
    Route::post('subscription/payment', [SubscriptionController::class, "processSubscription"])->name('user.subscription.payment');
    Route::get('invoices', [SubscriptionController::class, 'userInvoices'])->name('user.invoices');

    // print user invoice
    Route::get('invoice/{id}', [SubscriptionController::class, "printInvoice"])->name('user.invoice');
});
