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

Route::get('/user/profile', 'UserController@profile');
Route::post('/user/store', 'UserController@store');
Route::post('/user/updatePassword', 'UserController@updatePassword');
Route::get('/manage/users', 'ManageController@users');
Route::get('/manage/user/{id}', 'ManageController@user')->name('manage.user');
Route::post('/manage/store', 'ManageController@store');
Route::post('manage/destroy/{id}', 'ManageController@destroy');
