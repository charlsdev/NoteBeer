<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', [LoginController::class, 'renderLogin'])
   ->name('Login');

Route::post('/register', [LoginController::class, 'store'])
   ->name('saveNewUser');

Route::get('/welcome', [LoginController::class, 'renderWelcome'])
   ->name('Welcome');

Route::get('/email', [LoginController::class, 'renderEmail'])
   ->name('Email');
