<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Auth;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\User;

class UserController extends Controller
{
    public function quizHistory()
    {
        $user = auth()->user();
        $quizScores = $user->quizScores()->with('quiz')->get();

        return view('user.quiz-history', compact('quizScores'));
    }

    public function quizDetail($quizId)
    {
        $user = auth()->user();
        $quizDetails = $user->userAnswers()->where('quiz_id', $quizId)->with('question', 'answer')->get();

        $quizScore = DB::table('user_quiz_scores')
            ->where('user_id', $user->id)
            ->where('quiz_id', $quizId)
            ->first();

        $score = $quizScore ? $quizScore->score : null; // récupère le score si l'entrée existe, sinon assigne null

        return view('user.quiz-detail', compact('quizDetails', 'score'));
    }
}
