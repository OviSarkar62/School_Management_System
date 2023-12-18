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
Route::get('admin/teacher/create', [TeacherController::class, 'create'])->name('create.teacher');
Route::post('admin/teacher/store', [TeacherController::class, 'store'])->name('store.teacher');
Route::get('admin/teacher/index', [TeacherController::class, 'index'])->name('index.teacher');
Route::get('admin/teacher/edit', [TeacherController::class, 'edit'])->name('edit.teacher');
Route::put('admin/teacher/update', [TeacherController::class, 'update'])->name('update.teacher');
Route::delete('admin/teacher/destroy', [TeacherController::class, 'destroy'])->name('destroy.teacher');

// Student Routes
Route::get('admin/student/create', [StudentController::class, 'create'])->name('create.student');
Route::post('admin/student/store', [StudentController::class, 'store'])->name('store.student');
Route::get('admin/student/index', [StudentController::class, 'index'])->name('index.student');
Route::get('admin/student/edit', [StudentController::class, 'edit'])->name('edit.student');
Route::get('admin/student/show', [StudentController::class, 'show'])->name('show.student');
Route::put('admin/student/update', [StudentController::class, 'update'])->name('update.student');
Route::delete('admin/student/destroy', [StudentController::class, 'destroy'])->name('destroy.student');

// Parents Routes
Route::get('admin/parents/create', [ParentsController::class, 'create'])->name('create.parents');
Route::post('admin/parents/store', [ParentsController::class, 'store'])->name('store.parents');
Route::get('admin/parents/index', [ParentsController::class, 'index'])->name('index.parents');
Route::get('admin/parents/edit', [ParentsController::class, 'edit'])->name('edit.parents');
Route::put('admin/parents/update', [ParentsController::class, 'update'])->name('update.parents');
Route::delete('admin/parents/destroy', [ParentsController::class, 'destroy'])->name('destroy.parents');

// Subject Routes
Route::get('admin/subject/create', [SubjectController::class, 'create'])->name('create.subject');
Route::post('admin/subject/store', [SubjectController::class, 'store'])->name('store.subject');
Route::get('admin/subject/index', [SubjectController::class, 'index'])->name('index.subject');
Route::get('admin/subject/edit', [SubjectController::class, 'edit'])->name('edit.subject');
Route::put('admin/subject/update', [SubjectController::class, 'update'])->name('update.subject');
Route::delete('admin/subject/destroy', [SubjectController::class, 'destroy'])->name('destroy.subject');

// Grade Routes
Route::get('admin/grade/create', [GradeController::class, 'create'])->name('create.grade');
Route::post('admin/grade/store', [GradeController::class, 'store'])->name('store.grade');
Route::get('admin/grade/index', [GradeController::class, 'index'])->name('index.grade');
Route::get('admin/grade/edit', [GradeController::class, 'edit'])->name('edit.grade');
Route::put('admin/grade/update', [GradeController::class, 'update'])->name('update.grade');
Route::delete('admin/grade/destroy', [GradeController::class, 'destroy'])->name('destroy.grade');
Route::get('admin/grade/assign', [GradeController::class, 'assignSubject'])->name('assign.grade');
Route::post('admin/grade/store-assign', [GradeController::class, 'storeAssignedSubject'])->name('store-assign.grade');

// Attendance Routes
Route::get('admin/attendance/create', [AttendanceController::class, 'create'])->name('create.attendance');
Route::post('admin/attendance/store', [AttendanceController::class, 'store'])->name('store.attendance');
Route::get('admin/attendance/index', [AttendanceController::class, 'index'])->name('index.attendance');
Route::get('admin/attendance/show', [AttendanceController::class, 'show'])->name('show.attendance');



