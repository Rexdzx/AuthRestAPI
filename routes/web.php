<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewPostController;
use App\Http\Controllers\ViewAuthController;
use Illuminate\Http\Request;
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
    return view('home');
})->name('home');

// export data
Route::get('export', [ViewPostController::class, 'view'])->name('export');
Route::get('export/pdf', [ViewPostController::class, 'cetak']);

// register
Route::get('register', function () {
    return view('auth.register');
});
Route::post('register', [ViewAuthController::class, 'register'])->name('register');

//login
Route::get('login', function () {
    return view('auth.login');
});
Route::post('login', [ViewAuthController::class, 'login'])->name('login');

//logout
Route::get('logout', [ViewAuthController::class, 'logout'])->name('logout');

//create 
Route::middleware('auth:sanctum')->group(function () {
    Route::get('create', [ViewPostController::class, 'index'])->name('create');
    Route::post('create', [ViewPostController::class, 'store'])->name('store');
});
