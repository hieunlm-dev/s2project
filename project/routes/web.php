<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear-session', function() {
    session()->forget('username');
    session()->forget('cart');

    // return back();
});

////////////////////////////////////////////

Route::get('/','HomeController@index')->name('home');
Route::get('/shop','ShopController@index')->name('shop');
Route::get('/product/{id}','HomeController@productDetails')->name('product-details');



////////////////////////////////////////////
// Route::get('/register','HomeController@register')->name('register');
// Route::get('/process-register','HomeController@processRegister')->name('process-register');
Route::get('/register-success','HomeController@registerSuccess')->name('register-success');

Route::get('/login','HomeController@login')->name('login');
Route::get('/process-login','HomeController@processLogin')->name('process-login');
Route::get('/logout', 'HomeController@logout')->name('logout');


////////////////////////////////////////////
Route::get('/view-cart', 'HomeController@viewCart')->name('view-cart');
Route::get('/add-cart', 'HomeController@addCart')->name('add-cart');
Route::get('/delete-cart-item', 'HomeController@deleteCartItem')->name('delete-cart-item');
Route::get('/change-cart-quantity', 'HomeController@changeCartQuantity')->name('change-cart-quantity');

Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::post('/do-checkout', 'HomeController@doCheckout')->name('do-checkout');
// Route::get('/customer-profile', 'HomeController@customerProfile')->name('customer-profile');
// Route::put('/customer-update', 'HomeController@customerUpdate')->name('customer-update');



////////////////////////////////////////////
Route::get('/about','HomeController@about')->name('about');
Route::get('/policy','HomeController@policy')->name('policy');
Route::get('/contactus','HomeController@contactus')->name('contactus');


////////////////////////////////////////////
// Route::get('/search', 'SearchController@search')->name('search');
Route::get('/shop/search', 'HomeController@search')->name('search');
Route::get('/shop/{id}', 'ShopController@sortAsc');

////////////////////////////////////////////

Route::get('/admin/login', 'Admin\AdminController@login')->name('admin.login');
Route::get('/admin/logout', 'Admin\AdminController@logout')->name('admin.logout');
// Route::get('/admin/mail', 'Admin\AdminController@mail')->name('admin.mail');



Route::post('/admin/process-login', 'Admin\AdminController@processLogin')->name('admin.process-login');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin', 'as' => 'admin.'], function() {

    Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');

    Route::resource('account', 'Admin\AccountController');

    Route::resource('product', 'Admin\ProductController');

    Route::resource('brand', 'Admin\BrandController');

    Route::resource('order', 'Admin\OrderController');

    Route::resource('customer', 'Admin\CustomerController');

});

////////////////////////////////////////////////////
Route::resource('customer','Customer\CustomerController');
Route::resource('wish-list','WishListController');

// Route::get('/customer/{customer}/edit', 'Customer\CustomerController@edit')->name('customer.edit');
Route::get('history','OrderHistoryController@orderHistory')->name('order-history');
Route::get('history/{{$id}}','OrderHistoryController@orderDetailHistory');

////////////////////////////////////////////////////
Route::get('/contact','Contact\ContactController@index')->name('contact');
Route::post('/save-contact', 'Contact\ContactController@saveContact')->name('save-contact');

////////////////////////////////////////////////////
Route::get('/policy','HomeController@policy')->name('policy');

