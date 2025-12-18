<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\ProfileController;


Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('auth/login');
    })->name('home');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth', 'prevent-back')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard/dashboard');
    })->name('dashboard');

    // modul
    Route::get('/modul', [ModulController::class, 'index'])->name('modul.index');

    // kuis
    Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
    Route::get('/kuis/{id_modul}', [KuisController::class, 'show'])->name('kuis.show');
    Route::post('/kuis/{id_modul}/submit', [KuisController::class, 'submit'])->name('kuis.submit');
    Route::get('/kuis-history', [KuisController::class, 'history'])->name('kuis.history');

    // profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    
});