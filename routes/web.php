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
Route::get('/','SessionController@create');
Route::get('/login','SessionController@create')->name('login');
Route::resource('/users','UserController');
Route::post('/login','SessionController@store')->name('login');
Route::delete('/logout','SessionController@destroy')->name('logout');
Route::get('/users/create/confirm/{token}','UserController@confirmEmail')->name('confirm_email');
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/home','IndexController@home')->name('home');
Route::resource('/groups','GroupController',['only' => ['create','store','edit','update','show']]);
Route::get('/perPage','IndexController@perPage')->name('perPage');
Route::get('/allPage','IndexController@allPage')->name('allPage');
Route::get('/groups/{group}/users','GroupController@showUsers')->name('groups.show_users');
Route::post('/addUser/{group}','GroupController@addUser')->name('addUser');
Route::delete('/delUser/{group}/{user}', 'GroupController@delUser')->name('delUser');
Route::delete('/groups/leave/{group}', 'GroupController@leaveGroup')->name('leaveGroup');
Route::get('/groups/{group}/log','LogController@create')->name('logs.create');
Route::post('logs/store/{group}','LogController@store')->name('logs.store');
Route::post('/upload_img','LogController@uploadImg')->name('logs.upload_img');
Route::get('/logs/{group}/edit/{log}','LogController@create')->name('logs.edit');
Route::patch('/logs/update/{log}','LogController@update')->name('logs.update');
Route::delete('/logs/delete/{log}','LogController@delete')->name('logs.delete');
