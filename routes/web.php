<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::resource('movies', MovieController::class);
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::get('/developer', [PageController::class, 'developer'])->name('developer');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Hanya pengguna yang terautentikasi dapat mengakses rute ini
Route::middleware('auth')->group(function () {
    Route::resource('movies', MovieController::class);
    Route::resource('genres', GenreController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });