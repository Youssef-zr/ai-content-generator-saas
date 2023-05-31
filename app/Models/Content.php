<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $table = "contents";
    protected $guarded = [];
    protected $casts = [
        'data' => 'array'
    ];

    public function tone($tone_id)
    {
        return Tone::where("id",$tone_id)->first();
    }

    public function language($language_id)
    {
        return Language::where("id",$language_id)->first();
    }

    public function category($category_id)
    {
        return Tone::where("id",$category_id)->first();
    }

    public function prompt()
    {
        return $this->hasOne(Prompt::class, 'id', 'prompt_id');
    }

    public function question($question_id)
    {
        return Question::where('id', $question_id)->first();
    }

    public function filter_content_questions()
    {
        $questions = $this->data['questions'];
        $newQuestions = [];

        $q_keys = array_keys($questions);
        $q_values = array_values($questions);

        $needle = "question_";
        foreach ($q_keys as $index => $question) {
            if (str()->contains($question, $needle)) {
                $question_id = substr($question, 9);
                $key = Question::where('id', $question_id)->first()->question;
                $newQuestions[$key] = $q_values[$index];
            }
        }

        return $newQuestions;
    }
}

