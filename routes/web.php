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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/page','PageController@page')->name('page');

Route::get('/page_create','PageController@page_create')->name('page_create');

Route::get('/edit_page/{id}','PageController@edit_page')->name('edit_page');

Route::post('CreatePage', 'PageController@CreatePage')->name('CreatePage');
