<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // TODO: Change to card view
    return view('welcome');
});

// TODO: Remove that
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/verify/{token}', function () {
    // TODO: Verify the token
})->middleware(['auth', 'verified'])->name('verify');

require __DIR__.'/auth.php';
