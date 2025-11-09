<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\CategoryController;

Route::name('api.')->group(function () {
    // /api/courses (GET, POST)
    // /api/courses/{id} (GET, PUT, DELETE)
    Route::apiResource('courses', CourseController::class);

    // /api/teachers (GET, POST)
    Route::apiResource('teachers', TeacherController::class)
        ->only(['index', 'store']);

    // /api/categories (GET, POST)
    Route::apiResource('categories', CategoryController::class)
        ->only(['index', 'store']);
});
