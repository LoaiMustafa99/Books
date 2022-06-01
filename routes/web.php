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
    Route::prefix("reader")->name("reader.")->group(function (){
        Route::prefix("profile")->name("profile.")->group(function (){
            Route::get("/", "User\ProfileController@index")->name("index");
            Route::post("/{id}", "User\ProfileController@update")->name("update");
        });
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

        Route::prefix("request-books")->name("request-books.")->group(function (){
            Route::get("/","Admin\RequestBookController@index")->name("index");
            Route::post("/{id}", "Admin\RequestBookController@action")->name("action");
        });
    });
});

Route::get("/sub-categories/by/main-category", "Ajax\SubCategoryController@getByMainCategory")->name("sub_categories.by_main_category");
Route::get("/sub-categories/by/sub-category", "Ajax\SubCategoryController@getBySubCategory")->name("sub_categories.by_sub_category");

Route::prefix("ajax")->name("ajax.")->group(function (){
    Route::get("/", "Ajax\BookController@getSubCategory")->name("get_main_category");
    Route::get("/sub", "Ajax\BookController@getSubCategoryBySub")->name("get_sub_category");
    Route::get("/search", "Ajax\SearchController@index")->name("search");
});

Route::get("/", "User\DashboardController@index")->name("index");

Route::prefix("books")->name("books.")->group(function (){
    Route::get("/", "User\BooksController@index")->name("index");
    Route::get("/create", "User\BooksController@create")->name("create");
    Route::post("/store", "User\BooksController@store")->name("store");
    Route::get("/my-book", "User\BooksController@myBook")->name("my-book");
    Route::get("/{id}", "User\BooksController@edit")->name("edit");
    Route::put("/{id}", "User\BooksController@update")->name("update");
    Route::delete("/{id}", "User\BooksController@destroy")->name("destroy");
});

Route::prefix("category")->name("category.")->group(function (){
    Route::get("/", "user\CategoryController@index")->name("index");
    Route::get("/book/{id}", "user\CategoryController@show")->name("show");

    Route::prefix("book/{book_id}/comment")->name("comment.")->group(function (){
        Route::post("/", "User\BookCommentController@store")->name("store");
        Route::post("/delete", "User\BookCommentController@destroy")->name("delete");
    });

    Route::prefix("book/{book_id}/rating")->name("rating.")->group(function (){
        Route::post("/", "User\CategoryController@rating")->name("store");
    });

    Route::prefix("book/{book_id}/favorite")->name("favorite.")->group(function (){
        Route::post("/", "User\BookFavoriteController@store")->name("store");
    });
});

Route::prefix("rating")->name("rating.")->group(function (){
    Route::get("/", "User\RatingController@index")->name("index");
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
