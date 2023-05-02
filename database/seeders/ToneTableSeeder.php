<?php

namespace Database\Seeders;

use App\Models\Tone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tones = [
            "Friendly",
            "Luxury",
            "Relaxed",
            "Professional",
            "Bold",
            "Adventurous",
            "Witty",
            "Persuasive",
            "Empathetic",
            "Second Person",
        ];

        foreach ($tones as $tone) {
            Tone::create(['tone' => $tone]);
        }
    }
}
