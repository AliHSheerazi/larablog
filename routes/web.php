<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[App\http\Controllers\Admin\DashboardController::class, 'index']);
    
    Route::get('/category',[App\http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/add-category',[App\http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/add-category',[App\http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/edit-category/{category_id}',[App\http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('/edit-category/{category_id}',[App\http\Controllers\Admin\CategoryController::class, 'update']);
    Route::get('/delete-category/{category_id}',[App\http\Controllers\Admin\CategoryController::class, 'delete']);

    Route::get('/posts',[App\http\Controllers\Admin\PostController::class, 'index']);
    Route::get('/add-post',[App\http\Controllers\Admin\PostController::class, 'create']);
    Route::post('/add-post',[App\http\Controllers\Admin\PostController::class, 'store']);
    Route::get('/edit-post/{post_id}',[App\http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('/edit-post/{post_id}',[App\http\Controllers\Admin\PostController::class, 'update']);

    Route::get('/users',[App\http\Controllers\Admin\UserController::class, 'index']);
    Route::get('/edit-user/{user_id}',[App\http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('/edit-user/{user_id}',[App\http\Controllers\Admin\UserController::class, 'update']);
});