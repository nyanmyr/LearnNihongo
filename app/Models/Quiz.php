<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['lesson_id', 'question_type', 'question_text', 'correct_answer'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
