<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * These allow you to update XP and streaks easily[cite: 39].
     */
    protected $fillable =
    [
        'username',
        'password',
        'xp',
        'streak_days',
        'last_quiz_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden =
    [
        'password',
        'remember_token',
    ];

    protected $casts =
    [
        'last_quiz_at' => 'datetime',
    ];

    /**
     * Relationship: A user has many progress records[cite: 10].
     * This bridges the gap between traditional learning and digital tracking[cite: 48].
     */
    public function progress()
    {
        return $this->hasMany(UserProgress::class);
    }

    public function username()
    {
        return 'username';
    }
}
