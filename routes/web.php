<?php

Route::get('/', function () {
    return view('site/location');
});

Route::get('/editLocation', function() {
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

Route::get('/registeruser', function() {
    return view('register');
});

Route::get('/events', function() {
    return view('events');
});

Route::get('/eventos', function() {
    return view('site/eventos');
});

Route::get('/registerEvent', function() {
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


