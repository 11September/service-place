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

Route::get('/', 'WelcomeController@index');
Route::get('/search', 'WelcomeController@search');

Route::get('/post/{id}', 'WelcomeController@post');
Route::get('/user/{id}', 'WelcomeController@user');
Route::get('/profile', 'WelcomeController@profile')->middleware('auth');
Route::get('/editProfile', 'WelcomeController@editProfile')->middleware('auth');
Route::post('/updateProfile',  'WelcomeController@updateProfile')->middleware('auth');

Route::get('/login', 'WelcomeController@login');
Route::get('/register', 'WelcomeController@register');
Route::get('/social', 'WelcomeController@social');
Route::get('/new-post', 'WelcomeController@new_post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
