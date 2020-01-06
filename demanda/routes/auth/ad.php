<?php

Route::prefix('ad')->name('ad.')->namespace('Ad')->group(function () {

   	Auth::routes();

   	Route::get('/', 'HomeController@index')->name('home');

   	//Route::middleware('auth:ad')->group(function () {

      // 	Route::get('another', 'AnotherController@index')->name('another');

   	//});

});
