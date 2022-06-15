<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/fetchcat', 'AdminController@fetchcat')->name('fetchcat');
Route::post('/fetchproduct', 'AdminController@fetchproduct')->name('fetchproduct');
Route::post('/fetchorder', 'AdminController@fetchorders')->name('fetchorder');
Route::get('/fetchorder', 'AdminController@fetchorders')->name('fetchorder');
Route::post('/search_order', 'AdminController@search_order')->name('search_order');
Route::post('/categorysearch', 'AdminController@categorysearch')->name('categorysearch');

