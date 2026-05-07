<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// Ruta raíz → redirige al login si no está autenticado
Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// RUTAS DE GOOGLE (Añadí el ->name para que no te dé error en la vista)
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);

// DASHBOARD
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');