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
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\Admin\ParcerController as AdminParcerController;
use App\Http\Controllers\SocialController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/index', [IndexController::class, 'index'])->name('index');

Route::resource('/contacts', ContactController::class)->name('index', 'contacts');
Route::resource('/order', WidgetFormController::class)->name('index', 'order');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/account', AccountController::class)->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::resource('categories', AdminCategoryController::class)->name('index', 'categories.index');
        Route::group(['prefix' => 'resources'], function () {
            Route::resource('resources', AdminResourceController::class)->name('index', 'resources.index');
            Route::get('/parce/{resource}', AdminParcerController::class)->where('resource', '\d+')->name('resources.parce');
        });
        Route::resource('news', AdminNewsController::class)->name('index', 'news.index');
        Route::resource('users', AdminUserController::class)->name('index', 'users.index');
        Route::resource('contacts', AdminContactController::class)->name('index', 'contacts.index');
        Route::resource('orders', AdminOrderController::class)->name('index', 'orders.index');
    });
});

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/show/{news}', [NewsController::class, 'show'])->where('news', '\d+')->name('news.show');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories');
    Route::get('/show/{category}', [CategoryController::class, 'show'])->where('category', '\d+')->name('categories.show');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/init/vkontakte', [SocialController::class, 'init'])->name('vk.init');
    Route::get('/callback/vkontakte', [SocialController::class, 'callback'])->name('vk.callback');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
