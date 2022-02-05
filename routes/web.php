<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController,NewsController};
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Users\OrderController;
use App\Http\Controllers\Users\FeedbackController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Account\IndexController as AccountController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
        Route::view('/', 'admin.index')
        ->name('index');
        Route::resource('/category', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/source', AdminSourceController::class);
        Route::get('/news/destroy/{id}', [AdminNewsController::class, 'destroy'])
        ->where('id', '\d+')
        ->name('news.destroy');
        Route::get('/category/destroy/{id}', [AdminCategoryController::class, 'destroy'])
        ->where('id', '\d+')
        ->name('category.destroy');
        Route::get('/source/destroy/{id}', [AdminSourceController::class, 'destroy'])
        ->where('id', '\d+')
        ->name('source.destroy');
    });
    });

Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
	Route::resource('/order', OrderController::class);
    Route::resource('/feedback', FeedbackController::class);
    Route::get('/order/destroy/{id}', [OrderController::class, 'destroy'])
	->where('id', '\d+')
	->name('order.destroy');
    Route::get('/feedback/destroy/{id}', [FeedbackController::class, 'destroy'])
	->where('id', '\d+')
	->name('feedback.destroy');
});

Route::get('/category',[CategoryController::class, 'index'])
    ->name('category.index');

Route::get('/category/{id}',[CategoryController::class, 'show'])
->where('category', '\d+')
->name('category.show');

Route::view('/about','about.index',['controller' => 'controller'])
    ->name('about.index');

Route::get('/news', [NewsController::class, 'index'])
	->name('news.index');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');


    Route::get('/session', function() {
        if(session()->has('test')) {
            //dd(session()->all(), session()->get('test'));
            session()->forget('test');
        }

        session(['test' => rand(1,1000)]);
   });
   Auth::routes();

   Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
