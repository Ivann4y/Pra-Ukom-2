<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LikeController;
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
    Route::post('/likeFoto/{id_foto}', [LikeController::class, 'store']);
    Route::post('/komentar/{id_foto}', [KomentarController::class, 'store']);


    Route::controller(AlbumController::class)->group(function(){
        Route::get('/album', 'index');
        Route::get('/newAlbum', 'create');
        Route::post('/newAlbum', 'store');
        Route::get('/detailAlbum/{id_album}', 'show');
        // Route::get('/editAlbum/{id_album}/{username}', 'edit');
        // Route::put('/editAlbum/{id_album}', 'update');
        // Route::delete('/deleteAlbum/{id_album}', 'destroy');
    });

    Route::controller(FotoController::class)->group(function(){
        Route::get('/profil', 'index');
        Route::get('/newFoto', 'create');
        Route::post('/newFoto', 'store');
        Route::get('/editFoto/{id_foto}/{username}', 'edit');
        Route::put('/editFoto/{id_foto}', 'update');
        Route::get('/detailFoto/{id_foto}', 'show');
        Route::get('/deleteFoto/{id_foto}', 'destroy');
    });
});