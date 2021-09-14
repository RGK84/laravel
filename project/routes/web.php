<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//homepage
Route::get('/', [HomepageController::class, 'index'])
    ->name('home');

//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
 });
 
//news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

//categories
Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');
Route::get('/category/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('category.show');

//contacts
Route::get('/contacts', [ContactsController::class, 'index'])
    ->name('contacts');
Route::post('/contacts/store', [ContactsController::class, 'store'])
    ->name('contacts.store');

//order
Route::get('/order', [OrderController::class, 'index'])
    ->name('order');
Route::post('/order/store', [OrderController::class, 'store'])
    ->name('order.store');