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
    return view('admin.signIn');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('asset')->group(function() {
    Route::get('show', 'AssetController@index')->name('list-assets');
    Route::get('add', 'AssetController@create')->name('add-asset');
    Route::post('save', 'AssetController@store')->name('save-asset');
});

Route::prefix('asset-group')->group(function () {
    Route::get('add', 'CategoryController@create')->name('add-asset-group');
    Route::post('save', 'CategoryController@store')->name('store-asset-group');
    Route::get('show', 'CategoryController@index')->name('list-assets-group');
    Route::get('edit/{category}', 'CategoryController@edit')->name('edit-asset-group');
    Route::put('update/{category}', 'CategoryController@update')->name('update-asset-group');
    Route::get('delete/{category}', 'CategoryController@destroy')->name('delete-asset-group');
});

