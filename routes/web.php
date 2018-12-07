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

