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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('locations','API\LocationController');
Route::post('/location/create', 'API\LocationController@store');
Route::put('/location/update/{id}', 'API\LocationController@update');
Route::get('/location/list', 'API\LocationController@index');
Route::delete('/location/delete/{id}', 'API\LocationController@destroy');
Route::get('/location/{id}', 'API\LocationController@show');
Route::post('/location/files/upload-file', 'API\FileEntriesController@uploadFile');
Route::get('/location/files/{id}', 'API\FileEntriesController@index');
Route::get('/location/detail/{id}', 'API\LocationController@detailLocation');
route::get('/location/cicuit/{circuit}', 'API\LocationController@getCircuit');

Route::delete('/files/delete/{id}', 'API\FileEntriesController@deleteFile');

Route::group(['middleware' => 'auth'], function () {
    Route::get('files', 'FileEntriesController@index');

});

Route::get('/users', 'API\UserController@index');

Route::post('/events/create', 'API\EventsController@store');
Route::get('/events/list', 'API\EventsController@index');
Route::delete('/events/delete/{id}', 'API\EventsController@destroy');
Route::get('/events/show/{id}', 'API\EventsController@show');
Route::put('/events/update/{id}', 'API\EventsController@update');
route::get('/events/type/{name}', 'API\EventsController@getEvent');

Route::post('/users/create', 'API\UserController@store');
Route::get('/users/show/{id}', 'API\UserController@show');
Route::put('/users/update/{id}', 'API\UserController@update');
Route::delete('/users/delete/{id}', 'API\UserController@delete');

Route::resource('services', 'ServiceController');

Route::get('/services/getservices/{name}', 'ServiceController@getService');