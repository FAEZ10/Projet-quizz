<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use Illuminate\Auth\Events\VerificationRequest;
use App\Http\Controllers\LeaderboardController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//...

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('guest');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    event(new Verified($request->user()));

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Lien de vérification renvoyé!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');


Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');


Route::post('/password/reset/{token}', [AuthController::class, 'reset'])->name('password.reset.post');


Route::middleware(['auth'])->group(function () {
    Route::get('/quizzes', [HomeController::class, 'index'])->name('quizzes.index');
    Route::get('/quiz/{id}', [QuizController::class, 'play'])->name('quiz.play');
    Route::post('/quiz/{id}/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/quiz-history', [UserController::class, 'quizHistory'])->name('quiz.history');
    Route::get('/quiz-detail/{quizId}', [UserController::class, 'quizDetail'])->name('quiz.detail');
    Route::get('/leaderboard', [LeaderboardController::class, 'leaderboard'])->name('leaderboard');
});


Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);
        Route::get('/quizz', [AdminController::class, 'quizz']);
        Route::get('/questions', [AdminController::class, 'questions']);
        Route::get('/removequiz', [AdminController::class, 'removequiz']);
        Route::post('/savequiz', [AdminController::class, 'savequiz']);
        Route::post('/savequestion', [AdminController::class, 'savequestion']);
        Route::get('/answers/{quiz_id}', [AdminController::class, 'answer']);
        Route::post('/saveanswer', [AdminController::class, 'saveanswer']);
        Route::get('/removequiz', [AdminController::class, 'removequiz']);
        Route::get('/delete/{quiz_id}', [AdminController::class, 'delete']);
        Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.showUsers');
        Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
        Route::post('admin/changeUserRole/{id}', [AdminController::class, 'changeUserRole'])->name('admin.changeUserRole');
        Route::get('/update/{quiz_id}', [AdminController::class, 'update']);
    });
});
