<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::group(["prefix" => "dashboard"],function () {
    Route::get('/', ['uses' => 'UserController@showDashboard']);
    Route::get('/products', ['uses' => 'UserController@getProducts']);
    Route::get('/logout', ['uses' => 'UserController@logout']);
});
Route::match(['get', 'post'], '/register', "RegisterController@registerController")->name('register');
Route::match(['get', 'post'], '/login', "LoginController@loginController")->name('login');

Route::get('/', function () {
    return view('welcome');
});
