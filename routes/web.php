<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [QuizController::class, 'index'])->name('dashboard');
    Route::post('/start-quiz}', [QuizController::class, 'startQuiz'])->name('start.quiz');
    Route::get('/quiz/question/{index}', [QuizController::class, 'showQuestion'])->name('quiz.question');
    Route::post('/quiz/answer', [QuizController::class, 'submitAnswer'])->name('quiz.answer');
    Route::get('/quiz/result', [QuizController::class, 'showResult'])->name('quiz.result');
});

require __DIR__.'/auth.php';
