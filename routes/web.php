<?php

// use App\Http\Controllers\Admin\CategoryController;
// use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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




/* 
|    route admin
*/
// Route::match(['get', 'post'], '/Admin/login', 'Admin\Auth\LoginController@getLogin')->name('admin.login');
Route::get('/Admin/login','Admin\Auth\LoginController@getLogin')->name('admin.login');
Route::post('/Admin/login','Admin\Auth\LoginController@postLogin')->name('admin.login');
Route::get('/Admin/register','Admin\Auth\RegisterController@getRegister')->name('admin.register');
Route::post('/Admin/register','Admin\Auth\RegisterController@postRegister')->name('admin.register');

Route::prefix('admin')->middleware('adminAuth')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::post('/filter_chart_by_date','Admin\AdminController@filter_chart_by_date')->name('admin.filter_chart_by_date');

    // register resource route for admin
    Route::resources([
        'category'=>Admin\CategoryController::class,
        'product'=>Admin\ProductController::class,
        'variantProduct'=>Admin\VariantProductController::class,
        'banner'=>Admin\BannerController::class,
        'order'=>Admin\OrderController::class,
        'cusMan'=>Admin\CustomerManagementController::class,
        'review'=>Admin\ReviewController::class,
        'settingLink'=>Admin\SettingLinkController::class,
        'role'=>Admin\RoleController::class,
        'decentralize'=>Admin\DecentralizeController::class
    ]);

    // logout authentication
    Route::post('/logout','Admin\Auth\LoginController@logout')->name('admin.logout');
});


// if u want disable register system
// Auth::routes(['register' => false]);
// Auth::routes();


/* 
|    route client
*/
Route::get('/', 'Client\ClientController@index')->name('client.index');

Route::get('/shop', 'Client\ClientController@shop')->name('client.shop');

Route::get('/wishlist', 'Client\ClientController@wishlist')->name('client.wishlist');
Route::get('/wishlist/store', 'Client\ClientController@storeWishlist')->name('client.storeWishlist');
Route::get('/wishlist/destroy', 'Client\ClientController@destroyWishlist')->name('client.destroyWishlist');

Route::get('/checkout', 'Client\ClientController@checkout')->name('client.checkout');

Route::get('/blog', 'Client\ClientController@blog')->name('client.blog');

Route::get('/about', 'Client\ClientController@about')->name('client.about');

Route::get('/contact', 'Client\ClientController@contact')->name('client.contact');
Route::post('/contact', 'Client\ClientController@postContact')->name('client.contact');

Route::get('/product_detail/{id_product}', 'Client\ClientController@product_detail')->name('client.product_detail');
Route::post('/review', 'Client\CustomerController@review')->name('customer.review');

// route using cart 
Route::get('/cart', 'Client\CartController@index')->name('cart.index');
Route::get('/cart/store', 'Client\CartController@store')->name('cart.store');
Route::post('/cart/store', 'Client\CartController@store')->name('cart.store');
Route::get('/cart/destroy', 'Client\CartController@destroy')->name('cart.destroy');
Route::post('/cart/update', 'Client\CartController@update')->name('cart.update');

// login, register and manager my account (customer)
Route::get('/account', 'Client\CustomerController@index')->name('customer.index');
Route::post('/account/login', 'Client\CustomerController@postLogin')->name('customer.login');
Route::get('/account/logout', 'Client\CustomerController@getLogout')->name('customer.logout');
Route::post('/account/register', 'Client\CustomerController@postRegister')->name('customer.register');

// proceed to payment
Route::post('/payment', 'Client\CustomerController@payment')->name('customer.payment');
