<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ReservationController@index');


Route::resource('/reservation', 'ReservationController', ['except' => ['index', 'show']]);

Route::get('/bokningsbekraftelse/{reservation}', 'ReservationController@success')->name('reservation.success');

Route::get('/reservation/softDelete/{reservation}', 'ReservationController@softDelete')->name('reservation.softDelete');
Route::get('/reservation/restore/{id}', 'ReservationController@restore')->name('reservation.restore');
