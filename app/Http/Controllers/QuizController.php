<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Auth;


use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\User;

class QuizController extends Controller
{

    public function play($id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        $totalSeconds = $quiz->duration * 60;
        return view('user.quiz-play', compact('quiz', 'totalSeconds'));
    }

    public function submit(Request $request, $id)
    {
        $quiz = Quiz::with('questions.answers')->findOrFail($id);
        $submittedAnswers = $request->input('answers');
        $score = 0;

        $questionsWithAnswers = [];

        DB::beginTransaction();

        try {
            // Vérifiez et corrigez la colonne 'has' dans cette requête
            DB::table('user_answers')
                ->join('questions', 'questions.id', '=', 'user_answers.question_id')
                ->where('user_answers.user_id', Auth::id())
                ->where('questions.quiz_id', $id)
                ->delete();

            // Problème résolu ici avec la conversion en tableau
            DB::table('user_quiz_scores')->where('user_id', Auth::id())->where('quiz_id', $id)->delete();

            foreach ($quiz->questions as $question) {
                $correctAnswers = $question->answers->filter(function ($answer) {
                    return $answer->is_correct;
                })->pluck('id')->toArray();

                $selectedAnswers = isset($submittedAnswers[$question->id]) ? (array)$submittedAnswers[$question->id] : [];

                foreach ($selectedAnswers as $answerId) {
                    DB::table('user_answers')->insert([
                        'user_id' => Auth::id(),
                        'quiz_id' => $id,
                        'question_id' => $question->id,
                        'answer_id' => $answerId,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $questionData = [
                    'question' => $question,
                    'selected_answers' => $selectedAnswers,
                    'correct_answers' => $correctAnswers,
                    'is_correct' => array_diff($selectedAnswers, $correctAnswers) === array_diff($correctAnswers, $selectedAnswers),
                ];

                if ($questionData['is_correct']) {
                    $score++;
                }

                $questionsWithAnswers[] = $questionData;
            }

            // Enregistrement du score final
            DB::table('user_quiz_scores')->insert([
                'user_id' => Auth::id(),
                'quiz_id' => $id,
                'score' => $score,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Une erreur s’est produite lors de l’enregistrement de vos réponses. Veuillez réessayer.');
        }

        return view('user.quiz-result', compact('quiz', 'questionsWithAnswers', 'score'));
    }
}
