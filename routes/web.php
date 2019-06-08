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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Auth'], function() {

    Route::post('/login', 'LoginController@login')->name('login');
    Route::post('/logout', 'LoginController@logout')->name('logout');

});

Route::group(['prefix' => '/admin', 'namespace' => 'Admin'/*, 'middleware' => 'auth'*/], function() {
    
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/register', function () {
        return view('admin.panel.registration');
    },['as' => 'admin']);
    Route::post('/register', 'Auth\RegisterController@register',['as' => 'admin']);

    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/book', 'BookController', ['as' => 'admin']);
});

Route::group(['prefix' => '/upload', 'namespace' => 'Admin'/*, 'middleware' => 'auth'*/], function() {

    Route::get('/', 'AdminController@upload');
    Route::post('/', 'AdminController@uploadStore');

});