<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->integer('xp')->default(0);
            $table->integer('streak_days')->default(0);
            $table->timestamp('last_quiz_at')->nullable();
            $table->timestamps();
        });

        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., 'Hiragana Basics'
            $table->text('description')->nullable(); // Short summary
            $table->text('content_text'); // The actual Japanese lesson material
            $table->integer('order_num'); // Ensures 'Lesson 1' comes before 'Lesson 2'
            $table->timestamps();
        });

        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->string('question_type'); // 'vocabulary' or 'grammar'
            $table->string('question_text'); // The question for the student
            $table->string('correct_answer'); // The expected input
            $table->timestamps();
        });

        // database/migrations/xxxx_create_user_progress_table.php
        Schema::create('user_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->boolean('is_completed')->default(false);
            $table->integer('score')->default(0);
            $table->timestamps();

            // Optimization: This "covering index" makes progress tracking queries fast
            $table->index(['user_id', 'lesson_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('quizzes');
        Schema::dropIfExists('user_progress');
    }
};
