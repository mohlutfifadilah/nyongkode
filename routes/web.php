<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', 'AuthController@logout');;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/admin', function () {
    return view('admin.index');
});


Route::get('/admin', [AdminController::class, 'index']);
Route::resource('user', UserController::class);
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
