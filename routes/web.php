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

Route::get('/client/add', 'ClientController@addClientView')->name('add.client');

Route::post('/client/add', 'ClientController@addClient')->name('add.client.submit');

Route::post('/client/remove/{client_id}', 'ClientController@removeClient')->name('remove.client');


Route::get('/clients/upload', 'ClientController@uploadClients')->name('upload.clients');

Route::post('/clients/import', 'ClientController@import')->name('clients.import');

Route::get('/clients/export', 'ClientController@export')->name('clients.export');




// FOR SOURCE

Route::get('/sources', 'SourceController@index')->name('sources');

Route::get('/source/add', 'SourceController@addSourceView')->name('add.source');

Route::post('/source/add', 'SourceController@addSource')->name('add.source.submit');

Route::post('/source/remove/{source_id}', 'SourceController@removeSource')->name('remove.source');




// FOR SERVICE

Route::get('/services', 'ServiceController@index')->name('services');

Route::get('/service/add', 'ServiceController@addServiceView')->name('add.service');

Route::post('/service/add', 'ServiceController@addService')->name('add.service.submit');

Route::post('/service/remove/{service_id}', 'ServiceController@removeService')->name('remove.service');




// FOR PERSON

Route::get('/persons', 'PersonController@index')->name('persons');

Route::get('/person/add', 'PersonController@addPersonView')->name('add.person');

Route::post('/person/add', 'PersonController@addPerson')->name('add.person.submit');

Route::post('/person/remove/{person_id}', 'PersonController@removePerson')->name('remove.person');




// FOR LEAD STATUS

Route::get('/leadstatuses', 'LeadStatusController@index')->name('leadstatuses');

Route::get('/leadstatus/add', 'LeadStatusController@addLeadStatusView')->name('add.leadstatus');

Route::post('/leadstatus/add', 'LeadStatusController@addLeadStatus')->name('add.leadstatus.submit');

Route::post('/leadstatus/remove/{lead_status_id}', 'LeadStatusController@removeLeadStatus')->name('remove.leadstatus');