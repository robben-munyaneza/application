<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerr;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\RecruitmentStagesController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/signup', [AuthControllerr::class, 'showSignupForm'])->name('signup.form');
Route::post('/signup', [AuthControllerr::class, 'signup'])->name('signup');

Route::get('/login', [AuthControllerr::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthControllerr::class, 'login'])->name('login');



Route::get('/dashboard', [Dashboard::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthControllerr::class, 'logout']);

Route::resource('jobposition', JobPositionController::class);

Route::resource('applicants', ApplicantsController::class);

Route::resource('applications', ApplicationsController::class);

Route::resource('recruitmentstage', RecruitmentStagesController::class);



