<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController
{
    public function view_assignments(){
        return view('student.assignments');
    }

    public function view_challenges(){
        return view('student.challenges');
    }

    public function view_submit_assignment() {
        return view('student.submit_assignment');
    }

    public function view_submit_challenge() {
        return view('student.submit_challenge');
    }
}
