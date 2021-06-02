<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Htpp\Contollers\LogoutController;
use App\Htpp\Contollers\MainController;
use App\Htpp\Contollers\ImagesController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\FeaturedController;
use App\Http\Controllers\BrandsController;

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
        Route::get("/getproducts", "ProductsController@GetProducts")->name("getproducts");\
        Route::post("/updateproduct", "ProductsController@UpdateProduct");
        Route::post("/deleteproduct", "ProductsController@DeleteProducts");

        //image controller
        Route::post("/getimages", "ImagesController@GetImages");
        Route::post("/addimage", "ImagesController@AddImage");
        Route::post("/removeimage", "ImagesController@RemoveImage");
    });
    Route::prefix('/news')->group(function(){
        Route::get("/", "NewsController@ShowAllNews");
        Route::get("/getnews", "NewsController@GetNews");
        Route::get("/shownews/{id}", "NewsController@ShowNews");
        Route::get("/createnews", "NewsController@CreateNews");
        Route::post("/updatenews", "NewsController@UpdateNews");
    });
    Route::get("/admin", function(){
        echo "hello admin";
    });

    Route::prefix("/featured")->group(function(){
        Route::get("/", "FeaturedController@AllFeatured");
        Route::get("/getfeatured", "FeaturedController@GetFeatured");
        Route::post("/createfeatured", "FeaturedController@CreateFeatured");
        Route::post("/updatefeatured", "FeaturedController@UpdateFeatured");
        Route::post("/deletefeatured", "FeaturedController@DeleteFeatured");
    });

    Route::prefix("/brands")->group(function(){
        Route::get("/", "BrandsController@index")->name("admin.brands");
        Route::post("/", "BrandsController@get")->name("admin.getbrands");
        Route::post("/addbrand", "BrandsController@create")->name("admin.addbrand");
        Route::post("/updatebrand", "BrandsController@update")->name("admin.updatebrand");
        Route::post("/deletebrand", "BrandsController@delete")->name("admin.deletebrand");
    });
});

Route::group(['middleware' => 'auth:user'], function(){
    Route::get("/user", function(){
        echo "hello user";
    });
    
});


Route::get("/product/{id}", "ProductDetailsController@GetProductDetails");

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

Route::get("/logout", "LogoutController@logout")->name('logout');


Route::get('/', "MainController@index");
