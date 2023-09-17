<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/sign-up', [RegisterController::class, 'index'])->name('register');
Route::post('/sign-up', [RegisterController::class, 'store'])->name('register');




// Route::inertia('/', 'App');
// Route::inertia('/about', 'About');