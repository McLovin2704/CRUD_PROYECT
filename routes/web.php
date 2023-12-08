<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;

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
/*
Route::get('/', [BookController::class, 'index']);
Route::resource('books', BookController::class);

Route::post('books/{book}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/loan', [LoanController::class, 'index']);
Route::resource('loans', LoanController::class);
*/
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
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/books/{book}', [AdminController::class, 'showBook'])->name('admin.showBook');
    Route::get('/admin/create', [AdminController::class, 'createBook'])->name('admin.createBook');
    Route::post('/admin/books', [AdminController::class, 'storeBook'])->name('admin.storeBook');
    Route::get('/admin/books/{book}/edit', [AdminController::class, 'editBook'])->name('admin.editBook');
    Route::put('/admin/books/{book}', [AdminController::class, 'updateBook'])->name('admin.updateBook');
    Route::delete('/admin/books/{book}', [AdminController::class, 'destroyBook'])->name('admin.destroyBook');

    //Rutas prestamos
    Route::get('/loans', [AdminController::class, 'index'])->name('loans.index');
    Route::get('/loans/create', [AdminController::class, 'create'])->name('loans.create');
    Route::post('/loans', [AdminController::class, 'store'])->name('loans.store');
    Route::get('/loans/{loan}', [AdminController::class, 'show'])->name('loans.show');
    Route::get('/loans/{loan}/edit', [AdminController::class, 'edit'])->name('loans.edit');
    Route::put('/loans/{loan}', [AdminController::class, 'update'])->name('loans.update');
    Route::delete('/loans/{loan}', [AdminController::class, 'destroy'])->name('loans.destroy');
});

Route::middleware(['auth', 'role:cliente'])->group(function () {
    // Rutas para clientes
    Route::get('/client/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
    Route::get('/client/books/{book}', [ClientController::class, 'showBook'])->name('client.showBook');
   
    //Rutas Opiniones 
    Route::post('/review/{book}', [ClientController::class, 'store'])->name('review.store');
    Route::get('/review/{review}/edit', [ClientController::class, 'edit'])->name('review.edit');
    Route::put('/review/{review}', [ClientController::class, 'update'])->name('review.update');
    Route::delete('/review/{review}', [ClientController::class, 'destroy'])->name('review.destroy');
});

////////////////////////////////////////////////////////////////////////////////////////
