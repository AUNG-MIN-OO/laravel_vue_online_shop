<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Admin\CategoryController@index');

Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function (){
    Route::resource('/category','CategoryController');
    Route::resource('/product','ProductController');
});
