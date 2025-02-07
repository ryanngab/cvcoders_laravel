<?php

use App\Http\Controllers\Backend\AuthController as BackendAuthController;
use App\Http\Controllers\Backend\ProjectController as BackendProjectController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CoursesController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\ProjectsController;
use App\Http\Controllers\Frontend\SourceCodeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
// Route::get('/projects-search', [BackendProjectController::class, 'search'])->name('projects.search');
Route::get('/projects/live-search', [BackendProjectController::class, 'liveSearch'])->name('projects.live-search');
Route::get('/projects/filter', [BackendProjectController::class, 'filterByCategory'])->name('projects.filter');

Route::get('/source-code', [SourceCodeController::class, 'index'])->name('source-code');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses');

Route::group(['middleware' => 'isAdmin'], function () {
    Route::post('/projects', [BackendProjectController::class, 'store'])->name('projects.store');
});



Route::get('/dashboard-admin', [DashboardController::class, 'index'])->name('dashboard.admin');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [BackendAuthController::class, 'login'])->name('Backend.login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [BackendAuthController::class, 'register'])->name('register-store');
    Route::get('/forget-password', [AuthController::class, 'forget'])->name('forget');
    Route::get('/reset-password', [AuthController::class, 'reset'])->name('reset');
});

Route::post('/logout', [BackendAuthController::class, 'logout'])->name('logout');


