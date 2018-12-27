<?php

Route::get('/', function () {
    return view('site/location');
});

Route::get('/editLocation/{id}', function($id) {
    return view('editLocation');
});

Route::get('/loadLocationGallery/{id}', function() {
    return view('loadLocationGallery');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lugares', function() {
    return view('site/lugares');
});

Route::get('/locationdetail/{id}', function() {
    return view('site/locationdetail');
});

Route::get('/users', function() {
    return view('users');
});

Route::get('/events', function() {
    return view('events');
});

Route::get('/registeruser/{id}', function() {
    return view('register');
});

Route::get('/events', function() {
    return view('events');
});

Route::get('/eventos', function() {
    return view('site/eventos');
});

Route::get('/registerEvent/{id}', function() {
    return view('registerevent');
});

Route::get('/circuitoturistico', function() {
    return view('site/turistico');
});

Route::get('/circuitoreligioso', function() {
    return view('site/religioso');
});

Route::get('/circuitoarqueologico', function() {
    return view('site/arqueo');
});

Route::get('/circuitoecologico', function() {
    return view('site/ecologico');
});

Route::get('/eventosreligioso', function() {
    return view('site/eventreligioso');
});
Route::get('/eventosgrastro', function() {
    return view('site/eventgastronomico');
});
Route::get('/eventosculturales', function() {
    return view('site/eventculturales');
});

