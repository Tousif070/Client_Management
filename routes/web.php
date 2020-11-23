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




// FOR CLIENT

Route::get('/clients', 'ClientController@index')->name('clients');

Route::get('/add/client', 'ClientController@addClientView')->name('add.client');

Route::post('/add/client', 'ClientController@addClient')->name('add.client.submit');


Route::get('/clients/upload', 'ClientController@uploadClients')->name('upload.clients');

Route::post('/clients/import', 'ClientController@import')->name('clients.import');

Route::get('/clients/export', 'ClientController@export')->name('clients.export');




// FOR SOURCE

Route::get('/sources', 'SourceController@index')->name('sources');

Route::get('/add/source', 'SourceController@addSourceView')->name('add.source');

Route::post('/add/source', 'SourceController@addSource')->name('add.source.submit');




// FOR SERVICE

Route::get('/services', 'ServiceController@index')->name('services');

Route::get('/add/service', 'ServiceController@addServiceView')->name('add.service');

Route::post('/add/service', 'ServiceController@addService')->name('add.service.submit');




// FOR PERSON

Route::get('/persons', 'PersonController@index')->name('persons');

Route::get('/add/person', 'PersonController@addPersonView')->name('add.person');

Route::post('/add/person', 'PersonController@addPerson')->name('add.person.submit');




// FOR LEAD STATUS

Route::get('/leadstatuses', 'LeadStatusController@index')->name('leadstatuses');

Route::get('/add/leadstatus', 'LeadStatusController@addLeadStatusView')->name('add.leadstatus');

Route::post('/add/leadstatus', 'LeadStatusController@addLeadStatus')->name('add.leadstatus.submit');