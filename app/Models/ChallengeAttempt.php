<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeAttempt extends Model
{
    protected $fillable = [
        'submitted_answer',
        'challenge_id',
        'student_id',
        'is_correct',
        'updated_at',
        'created_at'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    use HasFactory;
}
