<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\{
    LanguageController,
    PlanController,
    PromptController,
    QuestionController,
    SettingController,
    ToneController,
    CategoryController,
    DashboardController,
    EngineController,
};
use App\Http\Controllers\Dashboard\Admin\User\{
    PermissionController,
    ProfileController,
    RoleController,
    UserController,
};
use App\Http\Controllers\Dashboard\Admin\Landing\{
    DesignController,
    BlockController,
    PartnerController,
};

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
*/


Route::group(["middleware" => ["web", "auth", 'role:Admin']], function () {
    Route::get('/', [DashboardController::class, "statistics"])->name('dashboard.statistics');

    Route::resource('categories', CategoryController::class);
    Route::get("/category/delete-all", [CategoryController::class, "delete_all"])->name('categories.delete-all');

    Route::resource('questions', QuestionController::class);
    Route::get("/question/delete-all", [QuestionController::class, "delete_all"])->name('questions.delete-all');

    Route::resource('tones', ToneController::class);
    Route::get("/tone/delete-all", [ToneController::class, "delete_all"])->name('tones.delete-all');

    Route::resource('engines', EngineController::class);
    Route::get("/engine/delete-all", [EngineController::class, "delete_all"])->name('engines.delete-all');

    Route::resource('languages', LanguageController::class);
    Route::get("/language/delete-all", [LanguageController::class, "delete_all"])->name('languages.delete-all');

    Route::resource('prompts', PromptController::class);
    Route::get("/prompt/delete-all", [PromptController::class, "delete_all"])->name('prompts.delete-all');


    // subscriptions
    Route::resource("subscriptions/plans", PlanController::class);
    Route::get("subscriptions/plan/delete-all", [PlanController::class, "delete_all"])->name('plans.delete-all');

    // settings
    Route::get("settings/brand", [SettingController::class, "brand_show"])->name('settings.brand_show');
    Route::put("settings/brand", [SettingController::class, "brand_update"])->name('settings.brand_update');

    Route::get("settings/third-parties", [SettingController::class, "third_party_show"])->name('settings.third_party_show');
    Route::put("settings/third-parties/open-ai", [SettingController::class, "update_open_ai_key"])->name('settings.update_open_ai_key');
    Route::put("settings/third-parties/paypal", [SettingController::class, "update_paypal_settings"])->name('settings.update_paypal_settings');

    Route::get("settings/content", [SettingController::class, "content_show"])->name('settings.content_show');
    Route::put("settings/content", [SettingController::class, "content_update"])->name('settings.content_update');

    // landing page design
    Route::get('customize/landing-page', [DesignController::class, "landing_page_show"])->name('customize.landing_page_show');
    Route::put('customize/landing-page', [DesignController::class, "landing_page_update"])->name('customize.landing_page_update');

    Route::get('customize/hero', [DesignController::class, "hero_show"])->name('customize.hero_show');
    Route::put('customize/hero', [DesignController::class, "hero_update"])->name('customize.hero_update');

    Route::get('customize/story', [DesignController::class, "story_show"])->name('customize.story_show');
    Route::put('customize/story', [DesignController::class, "story_update"])->name('customize.story_update');

    Route::get('customize/pricing', [DesignController::class, "price_show"])->name('customize.pricing_show');
    Route::put('customize/pricing', [DesignController::class, "price_update"])->name('customize.pricing_update');

    Route::get('customize/testimonial', [DesignController::class, "testimonial_show"])->name('customize.testimonial_show');
    Route::put('customize/testimonial', [DesignController::class, "testimonial_update"])->name('customize.testimonial_update');

    Route::resource("customize/partners", PartnerController::class);
    Route::get("customize/partner/delete-all", [PartnerController::class, "delete_all"])->name('partners.delete-all');

    Route::resource("customize/blocks", BlockController::class);
    Route::get("customize/block/delete-all", [BlockController::class, "delete_all"])->name('blocks.delete-all');

    // users
    Route::resource('users', UserController::class);

    // roles
    Route::resource('roles', RoleController::class);

    // permissions
    Route::resource('permissions', PermissionController::class);

    // user profile routes
    Route::get("profile", [ProfileController::class, 'show_profile'])->name('user.show_profile');
    Route::put("update-information", [ProfileController::class, 'update_information'])->name('user.update_information');
    Route::put("update-password", [ProfileController::class, 'update_password'])->name('user.update_password');
    Route::get("logout", [ProfileController::class, 'logout'])->name('user.logout');
});
