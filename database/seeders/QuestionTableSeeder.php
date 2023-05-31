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
                "question" => "Product/Brand Name",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "Describe your product",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "What is your blog title?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What is your blog topic?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "	What is the blog about?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "Describe your blog topic",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "What is the main point of the paragraph?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "What are you looking to create?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What are the main points you want to cover?",
                "type" => "multi_line",
                "is_required" => "optional",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "What topic are you posting about?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "Any specific keywords or phrases you would like to include?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "Who is your target audience?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What's your product called?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What is your post about?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "What are you passionate about?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "What role is this cover letter for?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What experience makes you a good candidate?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "Who is the message for?",
                "type" => "single_line",
                "is_required" => "optional",
                "minimum_answer_length" => 0,
            ],
            [
                "question" => "What is the occasion?",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
            [
                "question" => "Describe your image",
                "type" => "multi_line",
                "is_required" => "required",
                "minimum_answer_length" => 20,
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
