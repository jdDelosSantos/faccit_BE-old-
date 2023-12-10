<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('images', [App\Http\Controllers\ImageController::class, 'store']);
// Route::get('images', [App\Http\Controllers\ImageController::class, 'index']);
// Route::post('blobs', [App\Http\Controllers\BlobController::class, 'store']);
// Route::get('blobs', [App\Http\Controllers\BlobController::class, 'index']);

// Route::middleware(['cors'])->group(function () {

// });

Route::get('students', [App\Http\Controllers\StudentController::class, 'index']);
Route::post('students', [App\Http\Controllers\StudentController::class, 'store']);

Route::get('courses', [App\Http\Controllers\CourseController::class, 'index']);
Route::post('courses', [App\Http\Controllers\CourseController::class, 'store']);

Route::get('student_images', [App\Http\Controllers\StudentImageController::class, 'getAllStudentImages']);
Route::post('student_images', [App\Http\Controllers\StudentImageController::class, 'saveStudentImage']);

Route::post('upload', [App\Http\Controllers\UploadController::class, 'uploadImage']);
Route::get('getdataURL', [App\Http\Controllers\UploadController::class, 'getAllDataUrls']);

Route::post('student_attendances', [App\Http\Controllers\StudentAttendanceController::class, 'storeAttendance']);
Route::get('student_attendances', [App\Http\Controllers\StudentAttendanceController::class, 'index']);
