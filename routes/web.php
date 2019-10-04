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

Route::get('/', 'contacts_controller@index');
Route::get('/search', 'contacts_controller@search');

Auth::routes();

Route::get('/contact/create', 'contacts_controller@create')->middleware('auth');
Route::post('/contact', 'contacts_controller@store')->middleware('auth');

Route::get('contact/{person}', 'contacts_controller@show')->name('contact.show');
Route::get('/dashboard', 'contacts_controller@index')->middleware('auth');

Route::get('/contact/{person}/edit', 'contacts_controller@edit')->middleware('auth');
Route::patch('/contact/{person}', 'contacts_controller@update')->middleware('auth');

Route::delete('/contact/{person}/destroy', 'contacts_controller@destroy')->middleware('auth');

