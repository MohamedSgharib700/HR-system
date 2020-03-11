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


// Non-Logged in users API's
Route::prefix('v1')->attribute('namespace', 'Api')->group(function () {
    Route::post('/active', ['uses' => 'ActiveModelController@active', 'as' => 'api.model.active']);
    Route::get('/locations', ['uses' => 'LocationsController@index', 'as' => 'api.locations']);

});
