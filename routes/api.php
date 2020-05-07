<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.apitoken')->group(function() {
    Route::get('/company/all','ApiCompanyController@index')->name('company.all');
    Route::get('/company/{id}', 'ApiCompanyController@show')->name('company.show');
});


Route::get('/user/{id}', 'ApiUserController@show')->name('user.show');

