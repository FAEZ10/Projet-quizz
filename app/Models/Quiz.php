<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number_of_questions',
        'duration',
        'created_by',
        'description'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function scores()
    {
        return $this->hasMany(UserQuizScore::class);
    }
    public function usersPlayed()
    {
        return $this->belongsToMany(User::class, 'user_quiz_scores');
    }

    public function usersPlayedCount()
    {
        return $this->usersPlayed()->count();
    }
}
