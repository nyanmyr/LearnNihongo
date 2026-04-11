<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::orderBy('order_num')->get();
        return view('lessons.index', compact('lessons'));
    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        // Returns bite-sized language lessons with text and images [cite: 37]
        return view('lessons.show', compact('lesson'));
    }
}
