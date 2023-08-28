<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::resource('posts', App\Http\Controllers\PostController::class);
Route::get('posts/category/{id}', [App\Http\Controllers\PostController::class ,'postCategory'])->name('post_category');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Admin Backend */
Route::group(['prefix' =>'admin' ,'as'=>'admin.'],function () {
    Route::get( '/', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});
