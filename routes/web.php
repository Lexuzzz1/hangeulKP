<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModulController; 


Route::middleware('guest')->group(function () {
    Route::get('/', function () { return view('auth/login'); });
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    
    Route::get('dashboard/dashboard', function () {
        return view('dashboard/dashboard');
    });

    // modul
    Route::get('/modul', [ModulController::class, 'index'])->name('modul.index');

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});