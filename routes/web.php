<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WidgetFormController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

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

Route::get('/', [IndexController::class, 'index']);

Route::get('/index', [IndexController::class, 'index']);

Route::resource('/contacts', ContactController::class)->name('index', 'contacts');
Route::resource('/order', WidgetFormController::class)->name('index', 'order');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::resource('categories', AdminCategoryController::class)->name('index', 'categories.index');
        Route::resource('news', AdminNewsController::class)->name('index', 'news.index');
        Route::resource('users', AdminUserController::class)->name('index', 'users.index');
        Route::resource('contacts', AdminContactController::class)->name('index', 'contacts.index');
        Route::resource('orders', AdminOrderController::class)->name('index', 'orders.index');
    });
});

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('news');
    Route::get('/show/{news}', [NewsController::class, 'show'])
        ->where('news', '\d+')
        ->name('news.show');
});
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('categories');
    Route::get('/show/{categories}', [CategoryController::class, 'show'])
        ->where('id', '\d+')
        ->name('categories.show');
});
