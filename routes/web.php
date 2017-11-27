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
Route::post('/home/search', 'HomeController@search');
Route::get('/home/profile/{id}', 'HomeController@profile');
Route::get('/home/add', 'HomeController@add');
Route::post('/home/store', 'HomeController@store');
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/store', 'ProfileController@store');
Route::post('/profile/storePassword', 'ProfileController@storePassword');

Route::get('/manage', 'ManageController@index')->middleware('can:manage');
Route::get('/manage/users', 'UserController@list')->middleware('can:manage');
Route::get('/manage/user/{id}', 'UserController@show')->middleware('can:manage');
Route::post('/manage/user/store', 'UserController@store')->middleware('can:manage');
Route::post('/manage/user/destroy/{id}', 'UserController@destroy')->middleware('can:manage');
Route::get('/manage/offenders', 'OffenderController@list')->middleware('can:manage');
Route::get('/manage/offender/{id}', 'OffenderController@show')->middleware('can:manage');
Route::post('/manage/offender/store', 'OffenderController@store')->middleware('can:manage');
Route::post('/manage/offender/destroy/{id}', 'OffenderController@destroy')->middleware('can:manage');
Route::get('/manage/offences', 'OffenceController@list')->middleware('can:manage');
Route::get('/manage/offence/{id}', 'OffenceController@show')->middleware('can:manage');
Route::post('/manage/offence/store', 'OffenceController@store')->middleware('can:manage');