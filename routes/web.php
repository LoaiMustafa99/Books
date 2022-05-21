<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/register/user', 'Auth\RegisterController@showRegisterForm')->name("register.user");

Route::post('/register/user', 'Auth\RegisterController@createUser')->name("register.user.save");

Route::post("user/logout", "Auth\LoginController@logout")->name("user.logout");

Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm')->name("login");
Route::get('/user/login', 'Auth\LoginController@showBloggerLoginForm')->name("user.login");

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/reader', 'Auth\LoginController@bloggerLogin');

Route::group(['middleware' => 'auth:reader'], function () {
    Auth::routes();
    Route::prefix("/dashboard")->name("dashboard.")->group(function (){
        Route::get("/", "Admin\DashboardController@index")->name("index");
    });
});

Route::group(['middleware' => 'auth:admin'], function () {
    Auth::routes();

    Route::prefix("admin")->name("admin.")->group(function (){
        Route::prefix("/dashboard")->name("dashboard.")->group(function (){
            Route::get("/", "Admin\DashboardController@index")->name("index");
        });

        Route::prefix("category")->name("category.")->group(function (){
            Route::get("/", "Admin\CategoryController@index")->name("index");
            Route::get("/create", "Admin\CategoryController@create")->name("create");
            Route::post("/", "Admin\CategoryController@store")->name("store");
            Route::get("/{id}", "Admin\CategoryController@edit")->name("edit");
            Route::post("/edit/{id}", "Admin\CategoryController@update")->name("update");
            Route::delete("/{id}", "Admin\CategoryController@destroy")->name("destroy");
        });

        Route::prefix("category/{main_id}/sub-category")->name("sub_category.")->group(function (){
            Route::get("/", "Admin\SubCategoryController@index")->name("index");
            Route::get("/create", "Admin\SubCategoryController@create")->name("create");
            Route::post("/", "Admin\SubCategoryController@store")->name("store");
            Route::get("/{id}", "Admin\SubCategoryController@edit")->name("edit");
            Route::post("/edit/{id}", "Admin\SubCategoryController@update")->name("update");
            Route::delete("/{id}", "Admin\SubCategoryController@destroy")->name("destroy");
        });


        Route::prefix("user")->name("user.")->group(function(){
            Route::get("/","Admin\UserController@index")->name("index");
            Route::get("/create","Admin\UserController@create")->name("create");
            Route::post("/","Admin\UserController@store")->name("store");
            Route::get("/{id}","Admin\UserController@edit")->name("edit");
            Route::post("/edit/{id}","Admin\UserController@update")->name("update");
            Route::delete("/{id}","Admin\UserController@destroy")->name("destroy");
        });

        Route::prefix("books")->name("books.")->group(function (){
            Route::get("/","Admin\BookController@index")->name("index");
            Route::get("/create","Admin\BookController@create")->name("create");
            Route::post("/","Admin\BookController@store")->name("store");
            Route::get("/{id}","Admin\BookController@edit")->name("edit");
            Route::post("/edit/{id}","Admin\BookController@update")->name("update");
            Route::delete("/{id}","Admin\BookController@destroy")->name("destroy");
        });

        Route::get("/sub-categories/by/main-category", "Ajax\MainCategoryController@index")->name("sub_categories.by_main_category");

    });
});

Route::get("/", "User\DashboardController@index")->name("index");

Route::prefix("books")->name("books.")->group(function (){
    Route::get("/", "User\BooksController@index")->name("index");
});

Route::prefix("post")->name("post.")->group(function (){
    Route::get("/create", "user\PostController@create")->name("create");
    Route::post("/store", "user\PostController@store")->name("store");
    Route::get("/", "user\PostController@index")->name("index");
    Route::get("/edit/{id}", "user\PostController@edit")->name("edit");
    Route::put("/update/{id}", "user\PostController@update")->name("update");
    Route::delete("/destroy/{id}", "user\PostController@destroy")->name("destroy");

    Route::prefix("/comment")->name("comment.")->group(function (){
        Route::post("/store", "Ajax\CommentController@save")->name("store");
    });
});
