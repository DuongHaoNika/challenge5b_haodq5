<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'content'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }


    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    use HasFactory;
}
