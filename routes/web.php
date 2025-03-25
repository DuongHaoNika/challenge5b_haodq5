<?php

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