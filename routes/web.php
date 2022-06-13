<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/signin', function () {
    return view('auth.admin_login');
})->name('signin');

Route::post('/signIn', 'Auth\LoginController@signIn')->name('signIn');

Route::get('/', 'UserController@index')->name('index');
Route::get('/contactus', 'UserController@contactus')->name('contactus');
Route::get('/aboutus', 'UserController@aboutus')->name('aboutus');
Route::get('/addToCart/{dataId}', 'UserController@addToCart')->name('add');
Route::get('/getCart', 'UserController@getCart')->name('cart');
Route::get('/reduceByOne/{dataId}', 'UserController@reduceByOne')->name('reduce');
Route::get('/remove/{dataId}', 'UserController@getRemoveItem')->name('remove');
Route::get('/addByOne/{dataId}', 'UserController@addByOne')->name('addItem');
Route::post('/search', 'UserController@search')->name('search');
Route::get('/search/{data}', 'UserController@search1')->name('search');
Route::get('/searchbycat/{dataId}', 'UserController@searchbycat')->name('searchbycat');

Route::group(['middleware' => ['prevent-back-history']],function(){

    Route::get('/success', function () {
        return view('success');
    });
    Route::get('/checkout', 'UserController@checkout')->name('checkout');
    Route::post('/checkout_products', 'UserController@checkout_products')->name('checkout_products');
  });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'adminauth'], function () {

    Route::get('/admin', 'AdminController@admin')->name('admin');

    Route::post('/search_products', 'AdminController@search_products')->name('search_products');

    Route::post('/search_order', 'AdminController@search_order')->name('search_order');
    Route::post('/admin/post_category', 'AdminController@post_category')->name('post_category');
    Route::post('/admin/edit_category', 'AdminController@edit_category')->name('edit_category');
    Route::post('/admin/edit_product', 'AdminController@edit_product')->name('edit_product');
    Route::post('/admin/change_password', 'AdminController@change_password')->name('admin/change_password');
    Route::get('/categories', 'AdminController@category')->name('categories');
    Route::get('/products', 'AdminController@products')->name('products');
    Route::get('/pendingorders', 'AdminController@pendingorders')->name('pendingorders');
    Route::get('/completeorders', 'AdminController@completeorders')->name('completeorders');
    Route::get('/pendingdeliveries', 'AdminController@pendingdeliveries')->name('pendingdeliveries');
    Route::get('/hidden_products', 'AdminController@hidden_products')->name('hiden_products');
    Route::post('/store_product', 'AdminController@store_product')->name('store_product');
    Route::get('/show_cartegories/{dataId}', 'AdminController@show_cartegories')->name('show_cartegories');
    Route::get('/hide_cartegories/{dataId}', 'AdminController@hide_cartegories')->name('hide_cartegories');
    Route::get('/show_product/{dataId}', 'AdminController@show_product')->name('show_product');
    Route::get('/hide_product/{dataId}', 'AdminController@hide_product')->name('hide_product');
    Route::get('/show_hidden_product/{dataId}', 'AdminController@show_hidden_product')->name('show_product');
    Route::get('/hide_hidden_product/{dataId}', 'AdminController@hide_hidden_product')->name('hide_product');
    Route::get('/view_orderhistory/{dataId}', 'AdminController@view_orderhistory')->name('view_orderhistory');
    Route::get('/delete_cartegories/{dataId}', 'AdminController@delete_cartegories')->name('delete_cartegories');
    Route::get('/delete_product/{dataId}', 'AdminController@delete_product')->name('delete_product');
    Route::get('/aprove_order/{dataId}', 'AdminController@approve_order')->name('aprove_order');
    Route::get('/is_delivered/{dataId}', 'AdminController@is_delivered')->name('is_delivered');
    Route::post('/fetchcat', 'AdminController@fetchcat')->name('fetchcat');



    Route::get('/viewbycategories', function () {
        return view('adminbycart');
    });
    Route::get('/viewbyorder', function () {
        return view('adminbyorder');
    });
      });


      Route::get('/user_signOut', 'Auth\LoginController@signOut')->name('signOut');

      Route::get('/test', function () {
        return view('admin2');
    });


 //Clear route cache:
 Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

