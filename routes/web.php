<?php

use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\TagsController;
use App\Http\Controllers\Back\UsersController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ArticleTagController;
use App\Http\Controllers\Front\ArticleController as FrontArticleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/p/{slug}',[FrontArticleController::class, 'show']);

Route::middleware('auth')->group(function()
    {

        Route::resource('/article', ArticleController::class);
        Route::resource('/categories', CategoryController::class)->only([
            'index','store','update','destroy']);
        // Route::resource('/categories', CategoryController::class)->only([
        //     'index','store','update','destroy'
        // ])->middleware(UserAccess::class.':1'); cara supaya halaman categori hanya bisa di akses dengang role 1 
        Route::resource('/users',UsersController::class);
        Route::resource('/tags',TagsController::class);
        Route::resource('/article_tags', ArticleTagController::class); 
    });

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
Route::get('/logout',[DashboardController::class,'index'])->name('home');
