<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/manage/students', [TeacherController::class, 'students']);
Route::get('/manage/assignments', [TeacherController::class, 'view_assignment']);
Route::get('/manage/challenges', [TeacherController::class, 'view_challenges']);
Route::get('/manage/submissions', [TeacherController::class, 'view_submissions']);
Route::get('/manage/edit-assignment', [TeacherController::class, 'edit_assignment']);
Route::get('/manage/edit-challenge', [TeacherController::class, 'edit_challenge']);
Route::get('/manage/add-assignment', [TeacherController::class, 'add_assignment']);
Route::get('/manage/add-challenge', [TeacherController::class, 'add_challenge']);

Route::get('/student/assignments', [StudentController::class, 'view_assignments']);
Route::get('/student/challenges', [StudentController::class, 'view_challenges']);
Route::get('/student/submission/submit', [StudentController::class, 'view_submit_assignment']);
Route::get('/student/challenge/submit', [StudentController::class, 'view_submit_challenge']);

Route::get('/login', [UserController::class, 'view_login'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

