<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
