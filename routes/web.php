<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\couponController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\CustomerAddressController;
use App\Http\Controllers\Backend\ProductCategoriesController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\backend\ReviewController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\ShippingCompanyController;
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
Route::get('detail', [FrontendController::class, 'cart'])->name('detail');
Route::get('checkout', [FrontendController::class, 'checkout'])->name('checkout');
Route::get('product/{slug?}', [FrontendController::class, 'product'])->name('product');
Route::get('shop', [FrontendController::class, 'shop'])->name('shop');


/**************************************************************** Dashboard   ******************************************/

Route::prefix('/admin/')->name('admin.')->group(function () {

// auth route ====================================================================
    Route::get('login', [App\Http\Controllers\Backend\BackendController::class, 'login'])->name('adminLogin');
    Route::get('forgot', [App\Http\Controllers\Backend\BackendController::class, 'forgot'])->name('forgot');
    Route::get('index', [App\Http\Controllers\Backend\BackendController::class, 'dashboard'])->name('dashboard');
    Route::get('register', [App\Http\Controllers\Backend\BackendController::class, 'register'])->name('adminRegister');

    // category route ====================================================================
    Route::post('categories/delete', [CategoryController::class, 'delete_image'])->name('categories.delete_image');
    Route::resource('categories', CategoryController::class);

    // product route ====================================================================
    Route::post('products/delete', [ProductController::class, 'delete_image'])->name('products.delete_image');
    Route::resource('products', ProductController::class);
    Route::resource('coupons', couponController::class);

    // tag route ====================================================================
    Route::resource('tags', TagController::class);

    //  reviews route ====================================================================
    Route::resource('reviews', ReviewController::class);

    // customers route ====================================================================
    Route::post('customers/delete', [CustomerController::class, 'delete_image'])->name('customer.delete_image');
    Route::get('customer_addresses/get_customers', [CustomerController::class, 'get_customers'])->name('get_customers');
    Route::resource('customers', CustomerController::class);
    Route::resource('customer_addresses', CustomerAddressController::class);

    // countries  ================================================================================
    Route::resource('countries', CountryController::class);

    // states  ====================================================================================
    Route::get('states/get_states',[StateController::class,'get_states'])->name('states.get_states');
    Route::resource('states', StateController::class);

    // City  ========================================================================================
    Route::get('cities/get_states',[CityController::class,'get_cities'])->name('cities.get_cities');
    Route::resource('cities', CityController::class);

    // shipping_companies  ============================================================================
    Route::resource('shipping_companies',ShippingCompanyController::class);
});


/**************************************************************** livewire   ******************************************/

