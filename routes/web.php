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
Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'UserController@showDashboard']);

Route::get('/logout', array('uses' => 'UserController@logout'));

Route::get('/register', ['uses' => 'RegisterController@showRegister']);

Route::post('/register', array('uses' => 'RegisterController@doRegister'))->name('register');

Route::get('/login', ['uses' => 'LoginController@showLogin']);

Route::post('/login', array('uses' => 'LoginController@doLogin'))->name('login');

Route::get('/', function () {
    return view('welcome');
});
