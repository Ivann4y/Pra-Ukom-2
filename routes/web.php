<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function(){
    Route::view('/signup', 'auth.signup', ['tittle' => 'Sign Up'])->name('signup');
    Route::view('/signin', 'auth.signin', ['tittle' => 'Sign In']);
    Route::controller(AuthController::class)->group(function(){
        Route::post('/signup', 'signup');
        Route::post('/signin', 'signin');
    });
});

Route::middleware('auth')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::get('/', 'index');
    });

    Route::post('/signout', [AuthController::class, 'signout']);

    Route::controller(AlbumController::class)->group(function(){
        Route::get('/album', 'index');
    });
});


