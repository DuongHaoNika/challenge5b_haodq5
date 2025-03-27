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

    use HasFactory;
}
