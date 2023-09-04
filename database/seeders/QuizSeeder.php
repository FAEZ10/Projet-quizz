<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création de 3 quizzes
        for ($i = 1; $i <= 3; $i++) {
            $quiz = Quiz::create([
                'title' => 'Quizz de Test ' . $i,
                'number_of_questions' => 5,
                'duration' => 5,
                'created_by' => 1, // Utilisateur avec l'ID 1
                'description' => 'Description du quiz de test ' . $i,
            ]);

            // Pour chaque quiz, ajout de 5 questions avec leurs réponses
            for ($j = 1; $j <= 5; $j++) {
                $question = Question::create([
                    'quiz_id' => $quiz->id,
                    'question_text' => 'Question ' . $j . ' du quiz ' . $i . '?',
                    'number_of_answers' => 4, // Nouvelle ligne
                    'type' => 'single',
                    'points' => 1,
                ]);

                // Ajout de 4 réponses pour chaque question
                for ($k = 1; $k <= 4; $k++) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_text' => 'Réponse ' . $k . ' pour la question ' . $j,
                        'is_correct' => $k == 1 ? true : false, // La première réponse est la bonne
                    ]);
                }
            }
        }


        $user = User::find(1);
        if ($user) {
            $question = Question::first();
            $answer = Answer::where('question_id', $question->id)->first();

            DB::table('user_answers')->insert([
                'user_id' => $user->id,
                'quiz_id' => $question->quiz_id,
                'question_id' => $question->id,
                'answer_id' => $answer->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
