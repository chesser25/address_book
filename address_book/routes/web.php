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
Route::get('/contact/{person}/edit', 'ContactsController@edit')->name('contact.edit');
Route::patch('/contact/{person}', 'ContactsController@update')->name('contact.update');
Route::get('/contact/create', 'ContactsController@create')->name('contact.create');
Route::post('/contact', 'ContactsController@store')->name('contact.store');
