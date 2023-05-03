<?php

namespace Database\Seeders;

use App\Models\Prompt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prompts = [
            [
                "type" => "text",
                "title" => "Create Business Strategy",
                "description" => "This will create a business strategy",
                "prompt" => "Create a list of 5 business strategies to grow revenue",
                "max_tokens" => 3000,
                "engine_id" => 7,
                "category_id" => 1,
                "tone_id" => 4,
                "questions" => [1, 2, 3]
            ],
            [
                "type" => "text",
                "title" => "Table of ideas",
                "description" => "Create a table of ideas",
                "prompt" => "Create a list of 5 business strategies to grow revenue.  Display in a table with 3 columns - title, stratgey, value rating (1-5)",
                "max_tokens" => 3000,
                "engine_id" => 7,
                "category_id" => 1,
                "tone_id" => 4,
                "questions" => [1, 2, 3]
            ],
            [
                "type" => "text",
                "title" => "Healthcare",
                "description" => "Help write journal",
                "prompt" => "hjälp mig skriva en utförlig journal för",
                "max_tokens" => 3000,
                "engine_id" => 7,
                "category_id" => 2,
                "tone_id" => 4,
                "questions" => [1, 2, 3]
            ],
        ];

        foreach ($prompts as $prompt) {
            Prompt::create($prompt);
        }
    }
}
