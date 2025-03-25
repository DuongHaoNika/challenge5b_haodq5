<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge_attempt extends Model
{
    protected $fillable = [
        'submitted_answer'
    ];

    use HasFactory;
}
