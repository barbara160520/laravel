<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CategoryController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//news routes
//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::view('/', 'admin.index', ['someVariable' => 'someText'])
    ->name('index');
	Route::resource('/category', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

Route::get('/category',[CategoryController::class, 'index'])
    ->name('category.index');

Route::get('/category/{id}',[CategoryController::class, 'show'])
->where('id', '\d+')
->name('category.show');

Route::view('/about','about.index',['controller' => 'controller'])
    ->name('about.index');

Route::get('/news', [NewsController::class, 'index'])
	->name('news.index');

Route::get('/news/{id}', [NewsController::class, 'show'])
	->where('id', '\d+')
	->name('news.show');


