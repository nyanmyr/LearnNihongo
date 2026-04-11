<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // If they have a streak but haven't finished a quiz in over 48 hours, reset it.
        if ($user->last_quiz_at && $user->last_quiz_at->diffInMinutes(now()) > 24) {
        // if ($user->last_quiz_at && $user->last_quiz_at->diffInMinutes(now()) > 5) {
            $user->update(['streak_days' => 0]);
        }

        return view('dashboard', compact('user'));
    }
}
