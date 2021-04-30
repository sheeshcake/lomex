<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminLoginController;
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


Route::group(['middleware' => 'auth:admin'], function(){
    Route::get("/dashboard", "DashboardController@ShowDashboard");
    Route::prefix("/products")->group(function(){
        Route::get("/", "ProductsController@ShowProducts");
        Route::get("/newproduct", "ProductsController@CreateProduct")->name("newproduct");
        Route::get("/product/{id}", "ProductsController@ShowProduct");
        Route::get("/getproducts", "ProductsController@GetProducts")->name("getproducts");
    });
    Route::get("/admin", function(){
        echo "hello admin";
    });
});

Route::group(['middleware' => 'auth:user'], function(){
    Route::get("/user", function(){
        echo "hello user";
    });
});

//Users Functions
Route::prefix("/register")->group(function(){
    Route::get("/", "UserRegisterController@ShowRegister")->name("register");
    Route::post("/", "UserRegisterController@DoRegister")->name("register");
});
Route::prefix("/login")->group(function(){
    Route::get("/", "UserLoginController@ShowLogin")->name("login");
    Route::post("/", "UserLoginController@DoLogin")->name("login");
});


// Admin Functions
Route::prefix("/adminregister")->group(function(){
    Route::get("/", "AdminRegisterController@ShowRegister")->name("adminregister");
    Route::post("/", "AdminRegisterController@DoRegister")->name("adminregister");
});

Route::prefix("/adminlogin")->group(function(){
    Route::get("/", "AdminLoginController@ShowLogin")->name("adminlogin");
    Route::post("/", "AdminLoginController@DoLogin")->name("adminlogin");
});

Route::get("/logout", function(){
    Auth::logout();
    Session::flush();
    return redirect('/');
});


Route::get('/', function () {
    return view('welcome');
});
