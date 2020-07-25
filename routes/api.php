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

Route::get('admin/post/data', 'Admin\PostController@loadData')->name('data_post');
Route::get('admin/category/data', 'Admin\CategoryController@loadData')->name('data_category');
Route::get('admin/transaction/data', 'Admin\TransactionController@loadData')->name('data_transaction');

