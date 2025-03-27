<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'challenge_hint',
        'file_path',
        'file_content',
        'teacher_id'
    ];

    public function attempts()
    {
        return $this->hasMany(ChallengeAttempt::class);
    }
    use HasFactory;
}
