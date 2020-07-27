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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() { 

    Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::post('/admin/logout', 'Admin\DashboardController@logout')->name('logout');
    Route::get('/admin/post/index', 'Admin\PostController@index')->name('post.index');
    Route::get('/admin/post/create', 'Admin\PostController@create')->name('post.create');
    Route::post('/admin/post', 'Admin\PostController@save')->name('post.store');
    Route::get('/admin/post/edit/{id}', 'Admin\PostController@edit')->name('post.edit');
    Route::post('/admin/post/update/{id}', 'Admin\PostController@update')->name('post.update');
    Route::get('/admin/post/delete/{id}', 'Admin\PostController@destroy')->name('post.destroy');

    Route::get('/admin/category/index', 'Admin\CategoryController@index')->name('category.index');
    Route::get('/admin/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::post('/admin/category', 'Admin\CategoryController@save')->name('category.store');
    Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit')->name('category.edit');
    Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update')->name('category.update');

    Route::get('/admin/transaction/index', 'Admin\TransactionController@index')->name('transaction.index');
    Route::get('/admin/transaction/detail', 'Admin\TransactionController@detail')->name('transaction.detail');

});


Route::get('/home', 'HomeController@index')->name('home');
