<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Interactive Lessons
Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');

// Quiz & Practice System
Route::get('/lessons/{id}/quiz', [QuizController::class, 'show'])->name('quiz.show');
Route::post('/lessons/{id}/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

// Public Routes (Anyone can see these)
Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Protected Routes (Only logged-in students)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Add your lesson and quiz routes here too...
});
