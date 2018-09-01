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

Route::get('/login', 'WelcomeController@login');
Route::get('/register', 'WelcomeController@register');
Route::get('/profile', 'WelcomeController@profile');
Route::get('/social', 'WelcomeController@social');
Route::get('/new-post', 'WelcomeController@new_post');
Route::get('/post', 'WelcomeController@post');



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
