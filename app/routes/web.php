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


Route::get('/' , function(){
    return redirect('product');
});

Route::get('/products',  'ProductController@index')->name('product.list');
Route::get('/product/edit/{product_id}' , 'ProductController@edit')->where('product_id', '[0-9]+')->name('product.edit');
Route::get('/product/create', 'ProductController@create')->name('product.create');
Route::post('/product/create', 'ProductController@save')->name('product.save');
Route::patch('/product/update/{product_id}', 'ProductController@update')->where('product_id', '[0-9]+')->name('product.update');
Route::delete('/product/delete/{product_id}' , 'ProductController@delete')->where('product_id', '[0-9]+')->name('product.delete');

/*
Route::get('/stories',  'ProductController@index')->name('product.list');
Route::get('/store/edit/{product_id}' , 'ProductController@edit')->where('product_id', '[0-9]+')->name('product.edit');
Route::get('/store/create', 'ProductController@create')->name('product.create');
Route::post('/store/create', 'ProductController@save')->name('product.save');
Route::patch('/store/update/{product_id}', 'ProductController@update')->where('product_id', '[0-9]+')->name('product.update');
Route::delete('/store/delete/{product_id}' , 'ProductController@delete')->where('product_id', '[0-9]+')->name('product.delete');*/
