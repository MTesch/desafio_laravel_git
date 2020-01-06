<?php


Auth::routes();

Route::get('/teste', 'HomeController@index')->name('home');

//Route::middleware('auth:user')->group(function () {

// 	Route::get('another', 'AnotherController@index')->name('another');

//});

