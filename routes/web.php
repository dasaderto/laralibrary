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

    Route::group(['prefix' => '/admin'], function (){

        Route::get('/register', function () {
            return view('admin.panel.registration');
        })->name('registration');
        Route::post('/register', 'RegisterController@register');
    });
});

Route::get('/search', 'HomeController@search')->name('user.search');

Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => ['auth','role:admin']], function() {
    
    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/book', 'BookController', ['as' => 'admin']);

    Route::get("/book/page/{page}",'BookController@index',['as'=>'admin']);

    Route::get("/students/append",function (){
        return view('admin.panel.appendStudents');
    })->name('admin.appendingStudents');
    Route::post("/students/append",'AdminController@studentsAppend',['as'=>'admin']);

});

Route::group(['prefix' => '/upload', 'namespace' => 'Admin'/*, 'middleware' => 'auth'*/], function() {

    Route::get('/', 'AdminController@upload');
    Route::post('/', 'AdminController@uploadStore');

});