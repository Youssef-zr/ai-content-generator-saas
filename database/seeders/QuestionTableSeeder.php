<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                "question" => "What is your article title",
                "type" => "single_line",
                "is_required" => "required",
                "minimum_answer_length" => 10,
            ],
            [
                "question" => "Describe your image",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 40,
            ],
            [
                "question" => "What is the occasion?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 40,
            ],
            [
                "question" => "Who is the message for?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What experience makes you a good candidate?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 40,
            ],
            [
                "question" => "What role is this cover letter for?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What are you passionate about?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 40,
            ],
            [
                "question" => "What is your post about?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 40,
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
