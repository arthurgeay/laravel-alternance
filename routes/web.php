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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', function (){
    return redirect('/');
});

/** COMPANY */
Route::get('/company', 'CompanyController@index')->name('company.home');
Route::get('/company/create', 'CompanyController@create')->name('company.create');
Route::post('/company/store', 'CompanyController@store')->name('company.store');
Route::get('/company/{id}', 'CompanyController@show')->name('company.show');
Route::get('/company/edit/{id}', 'CompanyController@edit')->name('company.edit');
Route::post('/company/editStore/{id}', 'CompanyController@editStore')->name('company.editStore');
Route::get('/company/delete/{id}', 'CompanyController@delete')->name('company.delete');

/** CONTACT */
Route::post('/contact/create/{id}', 'ContactController@store')->name('contact.store');
Route::get('/contact/create/{id}', 'ContactController@create')->name('contact.create');

Route::get('/contact/edit/{id}', 'ContactController@edit')->name('contact.edit');
Route::post('/contact/editStore/{id}', 'ContactController@editStore')->name('contact.editStore');
Route::get('/contact/delete/{id}', 'ContactController@delete')->name('contact.delete');

/** APPLICATION */
Route::get('/application', 'ApplicationController@index')->name('application.home');
Route::get('/application/create', 'ApplicationController@create')->name('application.create');
Route::post('/application/store', 'ApplicationController@store')->name('application.store');
Route::get('/application/edit/{id}', 'ApplicationController@edit')->name('application.edit');
Route::post('/application/editStore/{id}', 'ApplicationController@editStore')->name('application.editStore');

/** USER */
Route::get('/user', 'UserController@index')->name('user.index');
