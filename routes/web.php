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

Route::get('/PageEdit/{id}','PageController@PageEdit')->name('PageEdit');

Route::post('editPage', 'PageController@editPage')->name('editPage');

Route::post('CreatePage', 'PageController@CreatePage')->name('CreatePage');
