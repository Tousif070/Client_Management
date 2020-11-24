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

Route::get('/client/add', 'ClientController@addClientView')->name('client.add');

Route::post('/client/add', 'ClientController@addClient')->name('client.add.submit');

Route::post('/client/remove/{client_id}', 'ClientController@removeClient')->name('client.remove');


Route::get('/clients/upload', 'ClientController@uploadClients')->name('clients.upload');

Route::post('/clients/import', 'ClientController@import')->name('clients.import');

Route::get('/clients/export', 'ClientController@export')->name('clients.export');




// FOR SOURCE

Route::get('/sources', 'SourceController@index')->name('sources');

Route::get('/source/add', 'SourceController@addSourceView')->name('source.add');

Route::post('/source/add', 'SourceController@addSource')->name('source.add.submit');

Route::post('/source/remove/{source_id}', 'SourceController@removeSource')->name('source.remove');




// FOR SERVICE

Route::get('/services', 'ServiceController@index')->name('services');

Route::get('/service/add', 'ServiceController@addServiceView')->name('service.add');

Route::post('/service/add', 'ServiceController@addService')->name('service.add.submit');

Route::post('/service/remove/{service_id}', 'ServiceController@removeService')->name('service.remove');




// FOR PERSON

Route::get('/persons', 'PersonController@index')->name('persons');

Route::get('/person/add', 'PersonController@addPersonView')->name('person.add');

Route::post('/person/add', 'PersonController@addPerson')->name('person.add.submit');

Route::post('/person/remove/{person_id}', 'PersonController@removePerson')->name('person.remove');




// FOR LEAD STATUS

Route::get('/leadstatuses', 'LeadStatusController@index')->name('leadstatuses');

Route::get('/leadstatus/add', 'LeadStatusController@addLeadStatusView')->name('leadstatus.add');

Route::post('/leadstatus/add', 'LeadStatusController@addLeadStatus')->name('leadstatus.add.submit');

Route::post('/leadstatus/remove/{lead_status_id}', 'LeadStatusController@removeLeadStatus')->name('leadstatus.remove');