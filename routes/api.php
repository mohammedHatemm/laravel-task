<?php

use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\TrackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('students', StudentController::class);
Route::apiResource('tracks', TrackController::class);
Route::apiResource('courses', CourseController::class);
