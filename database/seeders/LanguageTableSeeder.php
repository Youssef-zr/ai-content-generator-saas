<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            "Arabic",
            "English",
            "Spanish",
            "French",
            "German",
            "Swedish",
        ];

        foreach ($languages as $language) {
            Language::create(["language" => $language]);
        }
    }
}
