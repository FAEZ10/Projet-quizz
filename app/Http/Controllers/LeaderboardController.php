<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function leaderboard()
    {
        $users = DB::table('user_quiz_scores')
            ->select(DB::raw('user_id, SUM(score) as total_score'))
            ->groupBy('user_id')
            ->orderBy('total_score', 'DESC')
            ->get();

        return view('user.leaderboard', compact('users'));
    }
}
