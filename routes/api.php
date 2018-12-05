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
Route::get('/location/list', 'API\LocationController@index');
Route::delete('/location/delete/{id}', 'API\LocationController@destroy');
Route::get('/location/{id}', 'API\LocationController@show');
Route::post('/location/files/upload-file', 'API\FileEntriesController@uploadFile');
Route::get('/location/files/{id}', 'API\FileEntriesController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('files', 'FileEntriesController@index');
});