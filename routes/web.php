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

Route::get('/','BlogController@index');

Auth::routes();
////////////Blog Routes////////////////
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('blog', 'BlogController');
Route::get('blog/update/{blogId}', 'BlogController@update')->name('blog.update');
Route::post('blog/update/{blogId}', 'BlogController@update')->name('blog.update');

////////////User Routes//////////////
Route::resource('user', 'UserController');
Route::get('user/', 'UserController@list')->name('list');
Route::get('user/create', 'UserController@create')->name('user.create');
Route::get('user/profile/{userId}', 'UserController@profile')->name('user.profile');
Route::post('user/profile/{userId}', 'UserController@profile')->name('user.profile');
//Route::get('user/list', 'UserController@list')->name('list');
Route::post('user/store', 'UserController@store')->name('user.store');
Route::get('user/update/{userId}', 'UserController@update')->name('user.update');
Route::post('user/update/{userId}', 'UserController@update')->name('user.update');
