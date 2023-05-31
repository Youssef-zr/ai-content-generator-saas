<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'questions' => 'array'
    ];

    public function category()
    {
        return $this->hasOne(category::class, 'id', 'category_id');
    }

    public function engine()
    {
        return $this->hasOne(Engine::class, 'id', 'engine_id');
    }

    public function languge()
    {
        return $this->hasOne(Language::class, 'id', 'language_id');
    }

    public function tone()
    {
        return $this->hasOne(Tone::class, 'id', 'tone_id');
    }

    public function prompet_question($question_id)
    {
        return Question::where('id', $question_id)->first();
    }

    public function questions($question_ids)
    {
        return Question::whereIn("id", $question_ids)->get();
    }
}
