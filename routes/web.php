<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// User Login Routes
Route::view('/login', 'user.user-login')->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// User Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('user.dashboard');


// Teacher Routes
Route::get('/teacher/create', [TeacherController::class, 'create'])->name('create.teacher');
Route::post('/teacher/store', [TeacherController::class, 'store'])->name('store.teacher');
Route::get('/teacher/index', [TeacherController::class, 'index'])->name('index.teacher');
Route::get('/teacher/edit', [TeacherController::class, 'edit'])->name('edit.teacher');
Route::put('/teacher/update', [TeacherController::class, 'update'])->name('update.teacher');
Route::delete('/teacher/destroy', [TeacherController::class, 'destroy'])->name('destroy.teacher');

// Student Routes
Route::get('/student/create', [StudentController::class, 'create'])->name('create.student');
Route::post('/student/store', [StudentController::class, 'store'])->name('store.student');
Route::get('/student/index', [StudentController::class, 'index'])->name('index.student');
Route::get('/student/edit', [StudentController::class, 'edit'])->name('edit.student');
Route::get('/student/show', [StudentController::class, 'show'])->name('show.student');
Route::put('/student/update', [StudentController::class, 'update'])->name('update.student');
Route::delete('/student/destroy', [StudentController::class, 'destroy'])->name('destroy.student');

// Parents Routes
Route::get('/parents/create', [ParentsController::class, 'create'])->name('create.parents');
Route::post('/parents/store', [ParentsController::class, 'store'])->name('store.parents');
Route::get('/parents/index', [ParentsController::class, 'index'])->name('index.parents');
Route::get('/parents/edit', [ParentsController::class, 'edit'])->name('edit.parents');
Route::put('/parents/update', [ParentsController::class, 'update'])->name('update.parents');
Route::delete('/parents/destroy', [ParentsController::class, 'destroy'])->name('destroy.parents');
