<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegistretionController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
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
Route::get('/',[FrontendController::class,'index'])->name('frontend.home');
Route::prefix('user')->name('user.')->group(function(){
    Route::middleware('guest:web')->group(function(){
        Route::get('/login',[LoginController::class,'loginForm'])->name('login');
        Route::get('/register',[RegistretionController::class,'register'])->name('registration.form');
        Route::post('admin-registration',[RegistretionController::class,'adminRegistration'])->name('admin.registraton');
        Route::post('login-store',[LoginController::class,'storeLogin'])->name('store.login');
    });
    Route::middleware('auth:web')->group(function(){
        Route::get('home',[DashboardController::class,'index'])->name('dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('logout');
        Route::prefix('tags')->group(function(){
            Route::get('/',[TagController::class,'index'])->name('tags');
            Route::post('store',[TagController::class,'store'])->name('tag.store');
            Route::get('edit/{id}',[TagController::class,'edit'])->name('tag.edit');
            Route::post('update/{id}',[TagController::class,'update'])->name('tag.update');
            Route::get('delete/{id}',[TagController::class,'delete'])->name('tag.delete');
    });
        Route::prefix('categories')->group(function(){
            Route::get('/',[CategoryController::class,'index'])->name('categories');
            Route::post('store',[CategoryController::class,'store'])->name('category.store');
            Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
            Route::post('update/{id}',[CategoryController::class,'update'])->name('category.update');
            Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    });
        Route::prefix('posts')->group(function(){
            Route::get('/',[PostController::class,'index'])->name('posts');
            Route::get('create',[PostController::class,'create'])->name('post.create');
            Route::post('store',[PostController::class,'store'])->name('post.store');
            Route::get('edit/{id}',[PostController::class,'edit'])->name('post.edit');
            Route::post('update/{id}',[PostController::class,'update'])->name('post.update');
            Route::get('delete/{id}',[PostController::class,'delete'])->name('post.delete');

    });
    });
});
///Admin Routes
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest:admin')->group(function(){
        Route::get('/login',[AdminController::class,'loginForm'])->name('login');
        Route::post('login-store',[AdminController::class,'storeLogin'])->name('store.login');
    });
    Route::middleware('auth:admin')->group(function(){
        Route::get('home',[AdminController::class,'index'])->name('dashboard');
        Route::get('logout',[AdminController::class,'logout'])->name('logout');


    });
});






