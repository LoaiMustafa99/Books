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

Route::get('', 'Auth\LoginController@showBloggerLoginForm')->name("user.login");

Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::post('/login/reader', 'Auth\LoginController@bloggerLogin');

Route::group(['middleware' => 'auth:reader'], function () {
    Auth::routes();

    Route::prefix("reader")->name("reader.")->group(function (){
        Route::prefix("/dashboard")->name("dashboard.")->group(function (){
            Route::get("/", "User\DashboardController@index")->name("index");
        });

        Route::prefix("/referral-link")->name("referral_link.")->group(function (){
            Route::get("/", "User\ReferralLinkController@index")->name("index");
            Route::post("/store", "User\ReferralLinkController@store")->name("store");
            Route::delete("/delete/{id}","User\ReferralLinkController@destroy")->name("destroy");
            Route::get("/{id}/register-by-link", "User\ReferralLinkController@RegisterByLink")->name("register-by-link");
        });

        Route::prefix("wallet")->name("wallet.")->group(function (){
            Route::get("/", "User\TransactionController@index")->name("index");
            Route::get("/create", "User\TransactionController@create")->name("create");
            Route::post("/store", "User\TransactionController@store")->name("store");
            Route::get("/show", "User\TransactionController@showWallet")->name("show");
        });
    });
});

Route::group(['middleware' => 'auth:admin'], function () {
    Auth::routes();

    Route::prefix("admin")->name("admin.")->group(function (){
        Route::prefix("/dashboard")->name("dashboard.")->group(function (){
            Route::get("/", "Admin\DashboardController@index")->name("index");
        });

        Route::prefix("users")->name("users.")->group(function (){
            Route::get("/", "Admin\UserController@index")->name("index");
        });

        Route::prefix("wallet")->name("wallet.")->group(function (){
            Route::get("/", "Admin\WalletController@index")->name("index");
        });
    });
});
