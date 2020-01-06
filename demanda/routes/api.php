<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::namespace('Api')->name('api.')->group(function(){
    Route::prefix('admin')->group(function(){
		Route::get('/', 'DemandaAdController@index')->name('index_products');	
		Route::get('/{id}', 'DemandaAdController@show')->name('single_products');

    });
    
});

Route::namespace('Api')->name('api.')->group(function(){
    Route::prefix('anunciante/{anunciante}')->group(function(){
		Route::get('/', 'DemandaAdController@show_demanda_anunciante')->name('demanda_anunciante');	
		//Route::get('/{id}', 'DemandaAdController@show')->name('single_products');
		//Route::get('/{anunciante}', 'DemandaAdController@show_demanda_anunciante')->name('demanda_anunciante');

		Route::post('/', 'DemandaAdController@store')->name('store_demandas');
		Route::put('/{id}', 'DemandaAdController@update')->name('update_demandas');

		Route::delete('/{id}', 'DemandaAdController@delete')->name('delete_demanda');
    });
});
