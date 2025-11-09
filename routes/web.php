<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CourseController::class, 'index'])
    ->name('courses.index');

Route::resource('courses', CourseController::class);
Route::resource('teachers', TeacherController::class)
    ->only(['index', 'create', 'store']);
Route::resource('categories', CategoryController::class)
    ->only(['index', 'create', 'store']);
