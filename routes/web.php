<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectController;
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
    return view('welcome'); 
})->name('home');
//Route::GET('/', [ConnectController::class, 'index'])->name('home');


// ROUTER DE AUTH
Route::GET('/login', [ConnectController::class, 'getLogin'])->name('login');
Route::POST('/login', [ConnectController::class, 'postLogin'])->name('login');
Route::GET('/register', [ConnectController::class, 'getRegister'])->name('register');
Route::POST('/register', [ConnectController::class, 'postRegister'])->name('register');
Route::GET('/logout', [ConnectController::class, 'getLogout'])->name('logout');