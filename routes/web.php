<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    AdminController,
    ClientController,
};

Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'postLogin')->name('post-login'); 
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('client', ClientController::class);
});
