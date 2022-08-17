<?php

use App\Http\Controllers\Backend\ProductCategoriesController;
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
Auth::routes(['verify' => true]);

/******************************* Frontend   ***********************************/


//Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('detail', [FrontendController::class, 'detail'])->name('detail');
Route::get('shop', [FrontendController::class, 'shop'])->name('shop');


/********************** Dashboard   ******************************************/

Route::prefix('/admin/')->name('admin.')->group(function () {

// auth route ====================================================================
    Route::get('login', [App\Http\Controllers\Backend\BackendController::class, 'login'])->name('adminLogin');
    Route::get('forgot', [App\Http\Controllers\Backend\BackendController::class, 'forgot'])->name('forgot');
    Route::get('index', [App\Http\Controllers\Backend\BackendController::class, 'dashboard'])->name('dashboard');
    Route::get('register', [App\Http\Controllers\Backend\BackendController::class, 'register'])->name('adminRegister');


    // category route ====================================================================
    Route::post('categories/delete', [\App\Http\Controllers\Backend\CategoryController::class, 'delete_image'])->name('categories.delete_image');
    Route::resource('categories', \App\Http\Controllers\Backend\CategoryController::class);

    // product route ====================================================================
    Route::post('products/delete', [\App\Http\Controllers\Backend\ProductController::class, 'delete_image'])->name('products.delete_image');
    Route::resource('products', \App\Http\Controllers\Backend\ProductController::class);


    // tag route ====================================================================
    Route::resource('tags', \App\Http\Controllers\Backend\TagController::class);

});
