<?php

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

Auth::routes();

Route::get('/', function () {
    return view('index');
});

Route::get('/guestbook', 'GuestbookController@show');

Route::post('/guestbook', 'GuestbookController@add')->name('guestbook');

Route::get('/profile', function () {
	return view('profile');
});

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['web', 'auth']], function () {
	Route::get('/', function () {
		return view('welcome');
	});
});