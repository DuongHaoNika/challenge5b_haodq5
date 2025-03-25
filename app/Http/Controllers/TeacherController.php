<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function students()  {
        return view('teacher.manage-student');
    }

    public function view_assignment() {
        return view('teacher.assignments');
    }

    public function view_challenges() {
        return view('teacher.challenges');
    }

    public function view_submissions() {
        return view('teacher.view-submissions');
    }

    public function edit_assignment() {
        return view('teacher.edit-assignment');
    }

    public function edit_challenge() {
        return view('teacher.edit-challenge');
    }

    public function add_assignment() {
        return view('teacher.add-assignment');
    }

    public function add_challenge() {
        return view('teacher.add-challenge');
    }
}
