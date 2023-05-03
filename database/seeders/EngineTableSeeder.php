<?php

namespace Database\Seeders;

use App\Models\Engine;
use Illuminate\Database\Seeder;

class EngineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $engines = [
            [
                'title' => "Codex / code-davinci-002",
                'value' => "code-davinci-002",
            ],
            [
                'title' => "GPT-3 / code-cushman-001",
                'value' => "code-cushman-001",
            ],
            [
                'title' => "GPT-3 / text-ada-001",
                'value' => "text-ada-001",
            ],
            [
                'title' => "GPT-3 / text-babbage-001",
                'value' => "text-babbage-001",
            ],
            [
                'title' => "GPT-3 / text-curie-001",
                'value' => "text-curie-001",
            ],
            [
                'title' => "GPT-3 / text-davinci-003",
                'value' => "text-davinci-003",
            ],
            [
                'title' => "GPT-3.5 Turbo",
                'value' => "gpt-3.5-turbo",
            ],
        ];

        foreach ($engines as $engine) {
            Engine::create($engine);
        }
    }
}
