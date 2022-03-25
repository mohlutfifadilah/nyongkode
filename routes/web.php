<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\SubmodulController;

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

Route::group(['middleware' => ['auth', 'admin']], function () {
    //
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::resource('user', UserController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('modul', ModulController::class);
    Route::get('submodul/{id_modul}', [SubmodulController::class, 'create']);
    Route::resource('submodul', SubmodulController::class);
});

// Route::group(['middleware' => ['guest']], function () {
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);;
// });
