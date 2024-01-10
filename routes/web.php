<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
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

Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Admin Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard.admin');
    // Teacher Routes
    Route::prefix('teacher')->group(function () {
        Route::get('create', [TeacherController::class, 'create'])->name('create.teacher');
        Route::post('store', [TeacherController::class, 'store'])->name('store.teacher');
        Route::get('index', [TeacherController::class, 'index'])->name('index.teacher');
        Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('edit.teacher');
        Route::put('update/{id}', [TeacherController::class, 'update'])->name('update.teacher');
        Route::delete('destroy/{id}', [TeacherController::class, 'destroy'])->name('destroy.teacher');
    });

    // Student Routes
    Route::prefix('student')->group(function () {
        Route::get('create', [StudentController::class, 'create'])->name('create.student');
        Route::post('store', [StudentController::class, 'store'])->name('store.student');
        Route::get('index', [StudentController::class, 'index'])->name('index.student');
        Route::get('edit', [StudentController::class, 'edit'])->name('edit.student');
        Route::get('show', [StudentController::class, 'show'])->name('show.student');
        Route::put('update', [StudentController::class, 'update'])->name('update.student');
        Route::delete('destroy', [StudentController::class, 'destroy'])->name('destroy.student');
    });

    // Parents Routes
    Route::prefix('parents')->group(function () {
        Route::get('create', [ParentsController::class, 'create'])->name('create.parents');
        Route::post('store', [ParentsController::class, 'store'])->name('store.parents');
        Route::get('index', [ParentsController::class, 'index'])->name('index.parents');
        Route::get('edit', [ParentsController::class, 'edit'])->name('edit.parents');
        Route::put('update', [ParentsController::class, 'update'])->name('update.parents');
        Route::delete('destroy', [ParentsController::class, 'destroy'])->name('destroy.parents');
    });

    // Subject Routes
    Route::prefix('subject')->group(function () {
        Route::get('create', [SubjectController::class, 'create'])->name('create.subject');
        Route::post('store', [SubjectController::class, 'store'])->name('store.subject');
        Route::get('index', [SubjectController::class, 'index'])->name('index.subject');
        Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('edit.subject');
        Route::put('update', [SubjectController::class, 'update'])->name('update.subject');
        Route::delete('destroy', [SubjectController::class, 'destroy'])->name('destroy.subject');
    });

    // Grade Routes
    Route::prefix('grade')->group(function () {
        Route::get('create', [GradeController::class, 'create'])->name('create.grade');
        Route::post('store', [GradeController::class, 'store'])->name('store.grade');
        Route::get('index', [GradeController::class, 'index'])->name('index.grade');
        Route::get('edit', [GradeController::class, 'edit'])->name('edit.grade');
        Route::put('update', [GradeController::class, 'update'])->name('update.grade');
        Route::delete('destroy', [GradeController::class, 'destroy'])->name('destroy.grade');
        Route::get('assign', [GradeController::class, 'assignSubject'])->name('assign.grade');
        Route::post('store-assign', [GradeController::class, 'storeAssignedSubject'])->name('store-assign.grade');
    });

    // Attendance Routes
    Route::prefix('attendance')->group(function () {
        Route::get('create', [AttendanceController::class, 'create'])->name('create.attendance');
        Route::post('store', [AttendanceController::class, 'store'])->name('store.attendance');
        Route::get('index', [AttendanceController::class, 'index'])->name('index.attendance');
        Route::get('show', [AttendanceController::class, 'show'])->name('show.attendance');
    });
});
