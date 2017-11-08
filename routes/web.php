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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/search', 'HomeController@search');
Route::get('/home/profile/{id}', 'HomeController@profile')->name('home.profile');
Route::get('/home/add', 'HomeController@add');
Route::post('/home/store', 'HomeController@store');
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/store', 'ProfileController@store');
Route::post('/profile/storePassword', 'ProfileController@storePassword');

Route::get('/manage', 'ManageController@index');
Route::get('/manage/users', 'UserController@list');
Route::get('/manage/user/{id}', 'UserController@show')->name('manage.user');
Route::post('/manage/user/store', 'UserController@store');
Route::post('/manage/destroy/{id}', 'UserController@destroy');
