<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // site setitings
        view()->share('siteSetting', Setting::first());

        // dd(Setting::first());

        if (request()->segment(1) != "admin") {

            $textTools = Category::whereHas('prompts', function ($q) {
                $q->whereType('text');
            })->with('prompts')->orderBy("id", "desc")->get();

            $imageTools = Category::whereHas('prompts', function ($q) {
                $q->whereType('image');
            })->with('prompts')->orderBy("id", "desc")->get();

            view()->share(['textTools' => $textTools, 'imageTools' => $imageTools]);
        }
    }
}
