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

Route::prefix('{lang?}')->attribute('namespace', 'Web')->group(function () {
    Route::get('/', function () {
        return redirect(route('admin.home.index'));
    });

});


Route::prefix('{lang?}/admin')->attribute('namespace', 'Admin')->group(function () {
    Route::post('/attempt', ['uses' => 'AuthController@attempt', 'as' => 'admin.auth.attempt']);
    Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'admin.auth.logout']);
    Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'admin.auth.login']);
});

Route::prefix('{lang?}/admin')->attribute('namespace', 'Admin')->middleware('auth:web')->group(function () {
    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'admin.home.index']);
    Route::prefix('/user/{user}')->group(function () {
        Route::resource('papers', 'UserPapersController', ['as' => "admin.user"]);
        Route::resource('vacations', 'VacationsController', ['as' => "admin.user"]);
    });

    Route::resource('import', 'UsersImportController', ['as' => "admin.users"]);

    Route::resource('locations', 'LocationsController', ['as' => "admin"]);

    Route::resource('users', 'UserController', ['as' => 'admin']);
    Route::get('calendar', 'UserController@calendar', ['as' => 'admin.calendar']);

    Route::resource('departments', 'DepartmentsController', ['as' => "admin"]);
    Route::resource('positions', 'PositionsController', ['as' => "admin"]);

});


Route::prefix('{lang?}/normal')->attribute('namespace', 'Normal')->middleware('auth:web')->group(function () {
    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'normal.home.index']);

});
