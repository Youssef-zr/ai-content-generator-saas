<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTableSeeder::class,
            CategoryTableSeeder::class,
            QuestionTableSeeder::class,
            ToneTableSeeder::class,
            EngineTableSeeder::class,
            LanguageTableSeeder::class,
            PromptTableSeeder::class,
            PlanTableSeeder::class,
            SettingsTableSeeder::class,
            LandingPageTableSeeder::class,
            PartnerTableSeeder::class,
            BlockTableSeeder::class,
        ]);
    }
}
