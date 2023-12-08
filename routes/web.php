<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookController::class, 'index']);
Route::resource('books', BookController::class);

Route::post('books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/loan', [LoanController::class, 'index']);
Route::resource('loans', LoanController::class);

////////////////////////////////////////////////////////////////////////////////////////

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para el registro
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rutas para roles específicos
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rutas para administradores
    Route::get('/admin/dashboard', function () {
        return 'Dashboard del administrador';
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'role:client'])->group(function () {
    // Rutas para clientes
    Route::get('/client/dashboard', function () {
        return 'Dashboard del cliente';
    })->name('client.dashboard');
});

////////////////////////////////////////////////////////////////////////////////////////
