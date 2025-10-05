<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuizController extends Controller
{
    public function index()
    {
        $response = Http::get('https://the-trivia-api.com/api/categories');
        $categories = $response->successful() ? $response->json() : [];

        return view('quiz.categories', compact('categories'));
    }

    public function startQuiz(Request $request)
    {
        $category = $request->input('category');

        $response = Http::get('https://the-trivia-api.com/api/questions', [
            'categories' => $category,
            'limit' => 15,
        ]);

        $questions = $response->successful() ? $response->json() : [];

        if (count($questions) < 1) {
            return redirect()->route('dashboard')->with('error', 'No questions found!');
        }

        session([
            'quiz.questions' => $questions,
            'quiz.answers' => [],
            'quiz.score' => 0,
            'quiz.category' => $category,
        ]);

        return redirect()->route('quiz.question', ['index' => 1]);
    }


    public function showQuestion($index)
    {
        $questions = session('quiz.questions');

        if (!$questions || $index > count($questions)) {
            return redirect()->route('quiz.result');
        }

        $question = $questions[$index - 1];
        $answers = $question['incorrectAnswers'];
        $answers[] = $question['correctAnswer'];
        shuffle($answers);

        return view('quiz.question', [
            'question' => $question,
            'answers' => $answers,
            'questionNumber' => $index,
            'total' => count($questions),
        ]);
    }

    public function submitAnswer(Request $request)
    {
        $request->validate([
            'selected_answer' => 'required',
            'question_number' => 'required|integer',
        ]);

        $questionNumber = $request->question_number;
        $questions = session('quiz.questions');
        $correctAnswer = $questions[$questionNumber - 1]['correctAnswer'];

        $score = session('quiz.score', 0);
        $answers = session('quiz.answers', []);

        if ($request->selected_answer === $correctAnswer) {
            $score++;
        }

        $answers[$questionNumber] = [
            'selected' => $request->selected_answer,
            'correct' => $correctAnswer,
        ];

        session([
            'quiz.score' => $score,
            'quiz.answers' => $answers,
        ]);

        if ($questionNumber < count($questions)) {
            return redirect()->route('quiz.question', ['index' => $questionNumber + 1]);
        } else {
            return redirect()->route('quiz.result');
        }
    }

    public function showResult()
    {
        $questions = session('quiz.questions', []);
        $answers = session('quiz.answers', []);
        $score = session('quiz.score', 0);
        $total = count($questions);
        $percentage = ($score / $total) * 100;

        if ($percentage >= 60) {
            $status = 'Winner';
        } elseif ($percentage > 40) {
            $status = 'Better';
        } else {
            $status = 'Failed';
        }

        return view('quiz.result', compact('questions', 'answers', 'score', 'total', 'percentage', 'status'));
    }
}
