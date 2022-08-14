<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
});

Route::namespace('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);

    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login'); 
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/user', [AdminController::class, 'userForm'])->name('user.form');

    Route::post('/create-user', [AdminController::class, 'createUser'])->name('user.create');
    Route::post('/update-user', [AdminController::class, 'updateUser'])->name('user.update');
    Route::post('/delete-user', [AdminController::class, 'deleteUser'])->name('user.delete');
});
