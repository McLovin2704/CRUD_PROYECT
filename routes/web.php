<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LoanController;


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

