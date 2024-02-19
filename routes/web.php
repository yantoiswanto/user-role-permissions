<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::middleware('guest:web')->group(function () {
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@loginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login')->name('login.submit');
});

Route::group(['middleware' => 'auth.verify'], function () {
    Route::get('/', function () {
        return  view('pages.dashboard.index');
    })->name('dashboard');

    Route::resource('users', 'App\Http\Controllers\UserController', ['names' => 'users']);
    Route::resource('roles', 'App\Http\Controllers\RoleController', ['names' => 'roles']);

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
