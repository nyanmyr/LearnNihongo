<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\UserProgress;
use App\Models\Lesson;

class QuizController extends Controller
{
    public function submit(Request $request, $lesson_id)
    {
        $user = auth()->user();
        $answers = $request->input('answers');
        $correctCount = 0;
        $totalQuestions = count($answers);

        foreach ($answers as $quizId => $userAnswer) {
            $quiz = Quiz::find($quizId);
            if ($quiz && strtolower(trim($userAnswer)) === strtolower(trim($quiz->correct_answer))) {
                $correctCount++;
            }
        }

        $passed = ($correctCount / $totalQuestions >= 0.7);

        if ($passed) {
            // Gamification logic
            $today = now()->startOfDay();
            if (!$user->last_quiz_at || $today->greaterThan($user->last_quiz_at->startOfDay())) {
                $user->increment('streak_days');
            }
            $user->increment('xp', 20);
            $user->update(['last_quiz_at' => now()]);

            UserProgress::updateOrCreate(
                ['user_id' => $user->id, 'lesson_id' => $lesson_id],
                ['is_completed' => true, 'score' => $correctCount]
            );
        }

        // Redirect to results with data
        return view('quiz.results', [
            'score' => $correctCount,
            'total' => $totalQuestions,
            'passed' => $passed
        ]);
    }

    // Show all questions for a specific lesson
    public function show($lesson_id)
    {
        $lesson = Lesson::with('quizzes')->findOrFail($lesson_id);

        if ($lesson->quizzes->isEmpty()) {
            return redirect()->route('lessons.index')->with('error', 'This lesson has no quiz yet.');
        }

        return view('quiz.show', compact('lesson'));
    }
}
