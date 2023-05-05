<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blocks = [
            [
                'title' => 'In-Depth Analytics',
                'subtitle' => 'Track performance of your content and see topics resonating with your audience.',
            ],
            [
                'title' => 'Customizable Output',
                'subtitle' => 'Fine-tune the tone, style, and format of your content to suit your brand\'s needs.',
            ],
            [
                'title' => 'Intelligent Content Generation',
                'subtitle' => 'Automatically generate high-quality blog posts, articles, and more with AI.',
            ],
        ];

        foreach ($blocks as $block) {
            Block::create($block);
        }
    }
}
