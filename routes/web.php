<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\API\AuthController;
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
Route::get('export', [PostController::class, 'view'])->name('export');
Route::get('export/pdf', [PostController::class, 'cetak']);


Route::get('register', function () {
    return view('auth.register');
});
Route::post('register', [AuthController::class, 'register'])->name('register');


Route::get('login', function () {
    return view('auth.login');
});
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('create', [PostsController::class, 'index'])->name('create');
    Route::post('create', [PostsController::class, 'store'])->name('store');
});
