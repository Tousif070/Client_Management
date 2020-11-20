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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/clients/export', 'ClientController@export')->name('clients.export');


Route::get('/clients/upload', 'ClientController@uploadClients')->name('upload.clients');

Route::post('/clients/import', 'ClientController@import')->name('clients.import');
