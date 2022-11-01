<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::group(['prefix' => 'students', 'as' => 'students.'], function (){
//    Route::get('/',[StudentController::class,'index'])->name('index');
//    Route::get('/create',[StudentController::class,'create'])->name('create');
//    Route::post('/create',[StudentController::class,'store'])->name('store');
//    Route::delete('/destroy/{students}',[StudentController::class,'destroy'])->name('destroy');
//    Route::get('/edit/{students}',[StudentController::class,'edit'])->name('edit');
//    Route::put('/edit/{students}',[StudentController::class,'update'])->name('update');
//});

//Route::group(['prefix' => 'courses', 'as' => 'course.'], function (){
//    Route::get('/',[CourseController::class,'index'])->name('index');
//    Route::get('/create',[CourseController::class,'create'])->name('create');
//    Route::post('/create',[CourseController::class,'store'])->name('store');
//    Route::delete('/destroy/{course}',[CourseController::class,'destroy'])->name('destroy');
//    Route::get('/edit/{course}',[CourseController::class,'edit'])->name('edit');
//    Route::put('/edit/{course}',[CourseController::class,'update'])->name('update');
//});

Route::resource('courses',CourseController::class)->except(
    ['show',]
);
Route::resource('students',StudentController::class);


