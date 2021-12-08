<?php

use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\Admin\ParserController;

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

Auth::routes();

//auth
Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    //admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        Route::get('/', [AdminIndexController::class, 'index'])
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('resources', AdminResourceController::class);
        Route::get('/parser', ParserController::class)
            ->name('parser');
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/vk/login', [SocialController::class, 'startVK'])
        ->name('vk.login');
    Route::get('vk/callback', [SocialController::class, 'callbackVK'])
        ->name('vk.callback');
    Route::get('/fb/login', [SocialController::class, 'startFB'])
        ->name('fb.login');
    Route::get('fb/callback', [SocialController::class, 'callbackFB'])
        ->name('fb.callback');
});

//homepage
Route::get('/', [HomepageController::class, 'index'])
    ->name('home');

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



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
