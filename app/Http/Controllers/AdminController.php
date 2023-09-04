<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizzRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use App\Models\Quiz;
use Spatie\Permission\Models\Role;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $quizzes = Quiz::all();
        return view('admin.dashboard')->with('quizzes', $quizzes);
    }


    public function quizz()
    {
        return view('admin.quizz');
    }

    public function savequiz(request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'number_of_questions' => 'required|integer|min:1',
            'duration' => 'required|integer|min:1',
            'description' => 'required|string|max:1000',
        ]);

        $quizze = Quiz::create([
            'title' => $request['title'],
            'number_of_questions' => $request['number_of_questions'],
            'duration' => $request['duration'],
            'description' => $request['description'],
            'created_by' => Auth::id()
        ]);

        $quizze->save();

        $quiz = Quiz::where('created_by', Auth::id())->latest()->first();

        session()->put('quiz', $quiz);

        return redirect('/admin/questions')->with('quiz', $quiz);
    }

    public function questions()
    {

        $quiz = Quiz::where('created_by', Auth::id())->latest()->first();
        return view('/admin/questions')->with('quiz', $quiz);
    }
    public function savequestion(Request $request)
    {
        $request->validate([
            'questions.*.question_text' => 'required|string',
            'questions.*.points' => 'required|numeric',
            'questions.*.number_of_answers' => 'required|numeric',
        ]);

        $questionsData = $request->input('questions');
        $quiz_id = $request->input('quiz_id');

        foreach ($questionsData as $questionData) {
            $questionText = $questionData['question_text'];
            $points = $questionData['points'];
            $number_of_answers = $questionData['number_of_answers'] ?? 2; // Si 'number_of_answers' n'est pas défini, utilisez 2 comme valeur par défaut
            $type = isset($questionData['type']) ? 'multiple' : 'single';

            Question::create([
                'quiz_id' => $quiz_id,
                'question_text' => $questionText,
                'number_of_answers'  => $number_of_answers,
                'points' => $points,
                'type' => $type,
            ]);
        }

        $questions = Question::where('quiz_id', $quiz_id)->get();

        return redirect("admin/answers/{$quiz_id}");
    }


    public function answer($quiz_id)
    {
        $questions = Question::where('quiz_id', $quiz_id)->get();
        return view('admin.answers', compact('questions'));
    }


    public function saveanswer(Request $request)
    {


        $answersData = $request->input('answers');

        foreach ($answersData as $answerData) {
            $question_id = $answerData['question_id'];
            $answerTextArray = $answerData['answer_text'];


            if (!isset($answerData['is_correct'])) {
                $is_correctArray = array_fill(0, count($answerTextArray), 0);
            } else {
                $is_correctArray = $answerData['is_correct'];
            }


            if (count($answerTextArray) !== count($is_correctArray)) {
                return redirect()->back()->with('error', 'Les tableaux de réponses ne correspondent pas.');
            }


            foreach ($answerTextArray as $index => $answerText) {
                $is_correct = $is_correctArray[$index] ? 1 : 0;

                Answer::create([
                    'question_id' => $question_id,
                    'answer_text' => $answerText,
                    'is_correct' => $is_correct,
                ]);
            }
        }

        return redirect('/admin/dashboard');
    }

    public function removequiz()
    {
        $quizzes = Quiz::all();
        return view('admin.removequiz')->with('quizzes', $quizzes);
    }


    public function delete($quiz_id)
    {

        $quiz = Quiz::findOrFail($quiz_id);
        $quiz->delete();

        return redirect('/admin/removequiz')->with('success', 'Quiz deleted successfully');
    }


    public function update($quiz_id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $questions = Question::where('quiz_id', $quiz_id)->get();

        return view('admin.update', ['quiz' => $quiz, 'questions' => $questions]);
    }

    public function showUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function changeUserRole(Request $request, $id)
    {
        $user = User::find($id);
        $role = $request->input('role');
        if ($role) {
            $user->syncRoles($role);
            return redirect()->back()->with('success', 'User role changed successfully');
        } else {
            return redirect()->back()->with('error', 'Invalid role specified');
        }
    }
}
