<?php

// ROOT

Route::get('/', 'ClientController@index')->name('clients');




// FOR CLIENT

Route::any('/clients', 'ClientController@index')->name('clients');

Route::any('/clients/filter', 'ClientController@filterClients')->name('clients.filter');


Route::get('/client/search', 'ClientController@searchClientView')->name('client.search');

Route::post('/client/search', 'ClientController@searchClient')->name('client.search.submit');


Route::get('/client/add', 'ClientController@addClientView')->name('client.add');

Route::post('/client/add', 'ClientController@addClient')->name('client.add.submit');


Route::post('/client/remove/{client_id}/{type}', 'ClientController@removeClient')->name('client.remove');


Route::get('/client/edit/{client_id}', 'ClientController@editClientView')->name('client.edit');

Route::post('/client/edit/{client_id}', 'ClientController@editClient')->name('client.edit.submit');


Route::get('/clients/upload', 'ClientController@uploadClients')->name('clients.upload');

Route::post('/clients/import', 'ClientController@import')->name('clients.import');

Route::post('/clients/export', 'ClientController@export')->name('clients.export');




// FOR SOURCE

Route::get('/sources', 'SourceController@index')->name('sources');

Route::get('/source/add', 'SourceController@addSourceView')->name('source.add');

Route::post('/source/add', 'SourceController@addSource')->name('source.add.submit');

Route::post('/source/remove/{source_id}', 'SourceController@removeSource')->name('source.remove');

Route::get('/source/edit/{source_id}', 'SourceController@editSourceView')->name('source.edit');

Route::post('/source/edit/{source_id}', 'SourceController@editSource')->name('source.edit.submit');




// FOR SERVICE

Route::get('/services', 'ServiceController@index')->name('services');

Route::get('/service/add', 'ServiceController@addServiceView')->name('service.add');

Route::post('/service/add', 'ServiceController@addService')->name('service.add.submit');

Route::post('/service/remove/{service_id}', 'ServiceController@removeService')->name('service.remove');

Route::get('/service/edit/{service_id}', 'ServiceController@editServiceView')->name('service.edit');

Route::post('/service/edit/{service_id}', 'ServiceController@editService')->name('service.edit.submit');




// FOR PERSON

Route::get('/persons', 'PersonController@index')->name('persons');

Route::get('/person/add', 'PersonController@addPersonView')->name('person.add');

Route::post('/person/add', 'PersonController@addPerson')->name('person.add.submit');

Route::post('/person/remove/{person_id}', 'PersonController@removePerson')->name('person.remove');

Route::get('/person/edit/{person_id}', 'PersonController@editPersonView')->name('person.edit');

Route::post('/person/edit/{person_id}', 'PersonController@editPerson')->name('person.edit.submit');




// FOR LEAD STATUS

Route::get('/leadstatuses', 'LeadStatusController@index')->name('leadstatuses');

Route::get('/leadstatus/add', 'LeadStatusController@addLeadStatusView')->name('leadstatus.add');

Route::post('/leadstatus/add', 'LeadStatusController@addLeadStatus')->name('leadstatus.add.submit');

Route::post('/leadstatus/remove/{lead_status_id}', 'LeadStatusController@removeLeadStatus')->name('leadstatus.remove');

Route::get('/leadstatus/edit/{lead_status_id}', 'LeadStatusController@editLeadStatusView')->name('leadstatus.edit');

Route::post('/leadstatus/edit/{lead_status_id}', 'LeadStatusController@editLeadStatus')->name('leadstatus.edit.submit');




// FOR MEETING

Route::get('/meetings', 'MeetingController@index')->name('meetings');

Route::any('/meetings/filter', 'MeetingController@filterMeetings')->name('meetings.filter');

Route::get('/meeting/add', 'MeetingController@addMeetingView')->name('meeting.add');

Route::post('/meeting/add', 'MeetingController@addMeeting')->name('meeting.add.submit');

Route::post('/meeting/remove/{meeting_id}', 'MeetingController@removeMeeting')->name('meeting.remove');

Route::get('/meeting/edit/{meeting_id}', 'MeetingController@editMeetingView')->name('meeting.edit');

Route::post('/meeting/edit/{meeting_id}', 'MeetingController@editMeeting')->name('meeting.edit.submit');
