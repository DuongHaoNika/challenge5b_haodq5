<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAuthenticated;
use App\Http\Middleware\TeacherOnly;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::get('/profile/{id}', [UserController::class, 'profile'])->middleware(CheckAuthenticated::class)->name('profile');
Route::get('/edit-profile/{id}', [UserController::class, 'get_edit_profile'])->middleware(CheckAuthenticated::class)->name('profile.edit');
Route::put('/edit-profile/{id}', [UserController::class, 'update'])->middleware(CheckAuthenticated::class)->name('profile.edit');
Route::post('/comment', [UserController::class, 'comment'])->name('comment')->middleware(CheckAuthenticated::class);
Route::put('/comment/{id}', [UserController::class, 'updateComment'])->name('updateComment')->middleware(CheckAuthenticated::class);
Route::delete('/comment/{id}', [UserController::class, 'deleteComment'])->name('delete.comment')->middleware(CheckAuthenticated::class);

Route::middleware(['teacher_auth'])->prefix('manage')->group(function () {
    // Quản lý sinh viên
    Route::get('/students', [TeacherController::class, 'students'])->name('teacher.students');
    Route::delete('/delete-student/{id}', [TeacherController::class, 'delete_student'])->name('teacher.delete.student');

    // Quản lý bài tập
    Route::get('/assignments', [TeacherController::class, 'view_assignment'])->name('teacher.assignments');
    Route::get('/add-assignment', [TeacherController::class, 'add_assignment'])->name('teacher.add.assignment');
    Route::post('/add-assignment', [TeacherController::class, 'solve_add_assignment'])->name('teacher.post.add.assignment');
    Route::get('/edit-assignment/{id}', [TeacherController::class, 'edit_assignment'])->name('teacher.edit.assignment');
    Route::get('/view-assignment/{id}', [TeacherController::class, 'viewSubmissions'])->name('teacher.view.assignment');
    Route::delete('/delete-assignment/{id}', [TeacherController::class, 'delete_assignment'])->name('teacher.delete.assignment');
    Route::post('/update-assignment/{id}', [TeacherController::class, 'update_assignment'])->name('teacher.update.assignment');
    // Quản lý challenge
    Route::get('/challenges', [TeacherController::class, 'view_challenges'])->name('teacher.challenges');
    Route::get('/add-challenge', [TeacherController::class, 'add_challenge'])->name('teacher.add.challenge');
    Route::post('/add-challenge', [TeacherController::class, 'storeChallenge'])->name('teacher.store.challenge');
    Route::delete('/delete-challenge/{id}', [TeacherController::class, 'delete_challenge'])->name('teacher.delete.challenge');
    
    // Quản lý bài nộp
    Route::get('/submissions', [TeacherController::class, 'view_submissions'])->name('teacher.submissions');
});

Route::middleware(['student_auth'])->prefix('student')->group(function () {
    Route::get('/student/assignments', [StudentController::class, 'view_assignments']);
    Route::get('/student/challenges', [StudentController::class, 'view_challenges']);
    Route::get('/student/submission/submit', [StudentController::class, 'view_submit_assignment']);
    Route::get('/student/challenge/submit', [StudentController::class, 'view_submit_challenge']);
});

Route::get('/login', [UserController::class, 'view_login'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

