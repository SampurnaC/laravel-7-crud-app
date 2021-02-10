<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/', 'ContactController@index');
Route::resource('/contacts', 'ContactController');
Route::get('contacts/create/search', 'ContactController@simple')->name('simple_search');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ContactController@index')->name('home');

