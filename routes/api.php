<?php

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

Route::as('api.')->middleware(['api'])->group(function () {
    Route::namespace('Api')->group(function() {
        Route::apiResource('countries', 'CountryController', ['only' => 'index']);
        Route::apiResource('cities', 'CityController', ['only' => 'index']);
        Route::apiResource('jobs', 'JobOpeningController', ['only' => ['index', 'show']]);
        
        Route::middleware(['auth'])->group(function() {
            Route::get('me', 'UserController@me');
            Route::post('me', 'UserController@updateMe');

            Route::middleware(['role:SuperAdmin'])->group(function() {
                Route::apiResource('roles', 'RoleController');
                Route::apiResource('permissions', 'PermissionController');
                Route::apiResource('users', 'UserController');
            });

            Route::middleware(['role:SuperAdmin|Admin|Client'])->group(function() {
                Route::apiResource('jobs', 'JobOpeningController', ['only' => ['store', 'update', 'destroy']]);
            });

            Route::middleware(['role:Admin|SuperAdmin'])->group(function() {
                Route::apiResource('candidates', 'CandidateController')->only(['index', 'show']);
                Route::apiResource('clients', 'ClientController');
            });

            Route::namespace('Candidate')->middleware(['role:Candidate'])->prefix('candidate')->group(function() {
                Route::apiResource('resume', 'ResumeController');
            });
        });
    });

    Route::as('auth.')->prefix('auth')->group(function() {
        Route::post('authenticate', 'Auth\LoginController@login')->name('authenticate');
    });
});
