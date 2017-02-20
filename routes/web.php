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

Route::get('/', 'Wall\WallController@show');
Route::get('articles/{id}', 'Wall\ArticleController@show');
Route::get('/searchbytag/{tag}', 'Search\SearchbytagController@result');

Route::group(['middleware'=>['web', 'auth']], function (){
	Route::get('article/like/{id}', ['uses'=>'Wall\ArticleController@like']);
	Route::get('article/dislike/{id}', ['uses'=>'Wall\ArticleController@dislike']);
	Route::get('article/delete/{id}', ['uses'=>'Wall\ArticleDeleteController@delete']);
	//
	Route::get('/article/add', ['uses'=>'Wall\ArticleAddController@show']);
	Route::post('/article/add', ['uses'=>'Wall\ArticleAddController@add', 'as'=>'articleAdd']);
	//
	Route::get('/profile', 'Profile\ProfileController@show');
	Route::post('/profile', 'Profile\ProfileController@edit')->name('profile');
});

Route::get('/guestbook', 'Guestbook\GuestbookController@show');
Route::post('/guestbook', 'Guestbook\GuestbookController@add')->name('guestbook');
Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['web', 'auth']], function () {
	Route::get('/', function () {
		return view('welcome');
	});
});