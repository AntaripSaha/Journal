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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::get('feedback', ['uses' => 'Feedback\FeedbackController@index', 'as' => 'feedback.index']);
Route::post('feedback', ['uses' => 'Feedback\FeedbackController@store', 'as' => 'feedback.store']);
Route::delete('feedback/{id}', ['uses' => 'Feedback\FeedbackController@destroy', 'as' => 'feedback.destroy', 'middleware' => ['auth', 'admin']]);

Route::resource('articles', 'Article\ArticleController');
Route::get('articles/{id}/like/{status}', 'Article\LikeController@like')->name('articles.like')->middleware(['auth']);
Route::post('articles/{id}/comment', ['uses'=>'Article\CommentController@add', 'as'=>'articles.comment'])->middleware(['auth']);
Route::delete('articles/{id}/comment/{comment}/destroy', ['uses'=>'Article\CommentController@destroy', 'as'=>'articles.comment.destroy', 'middleware' => ['auth', 'admin']]);

Route::post('articles/{id}/subcomment/{comment}', ['uses'=>'Article\SubcommentController@add', 'as'=>'articles.comment.subcomment'])->middleware(['auth']);
Route::delete('articles/{id}/subcomment/{comment}/destroy', ['uses'=>'Article\SubcommentController@destroy', 'as'=>'articles.comment.subcomment.destroy', 'middleware' => ['auth', 'admin']]);

Route::get('/searchbytag/{tag}', 'Search\SearchbytagController@result');

Route::group(['middleware'=>['web', 'auth']], function (){
	Route::get('/profile', 'Profile\ProfileController@index')->name('profile.index');
	Route::post('/profile', 'Profile\ProfileController@edit')->name('profile.edit');
});

Route::group(['prefix'=>'admin', 'middleware'=>['web', 'auth', 'admin']], function () {
	Route::get('/', ['uses'=>'Admin\AdminController@show', 'as' => 'adminIndex']);
	Route::get('/userlist', ['uses'=>'Admin\UserListController@show', 'as'=>'userList']);
});

