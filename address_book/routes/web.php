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

Route::get('/', 'ContactsController@index');
Route::get('/search', 'ContactsController@search');

Auth::routes();

Route::get('/contact/create', 'ContactsController@create')->middleware('auth');
Route::post('/contact', 'ContactsController@store')->middleware('auth');

Route::get('contact/{person}', 'ContactsController@show')->name('contact.show');
Route::get('/dashboard', 'ContactsController@index')->middleware('auth');

Route::get('/contact/{person}/edit', 'ContactsController@edit')->middleware('auth');
Route::patch('/contact/{person}', 'ContactsController@update')->middleware('auth');

Route::delete('/contact/{person}/destroy', 'ContactsController@destroy')->middleware('auth');

