<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'file_path',
        'assignment_id',
        'student_id',
        'submitted_at',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

}
