<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Prompt;
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

        if (request()->segment(1) != "admin") {
            $textTools = Category::whereHas('prompts', function ($q) {
                $q->whereType('text');
            })->with('prompts')->orderBy("id","desc")->get();

            $imageTools = Category::whereHas('prompts', function ($q) {
                $q->whereType('image');
            })->with('prompts')->orderBy("id","desc")->get();

            view()->share(['textTools' => $textTools, 'imageTools' => $imageTools]);
        }
    }
}
