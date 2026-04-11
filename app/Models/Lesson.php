<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['title', 'description', 'content_text', 'order_num'];

    // List all available lessons
    public function index()
    {
        $lessons = Lesson::orderBy('order_num')->get();
        return view('lessons.index', compact('lessons'));
    }

    // Show a specific bite-sized lesson
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lessons.show', compact('lesson'));
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
