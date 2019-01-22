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

Route::middleware('auth:api')->group(function() {
    Route::group(['prefix' => 'notebook'], function() {
        Route::post('/', 'API\NotebookController@store');
        Route::post('/{notebook}/notes', 'API\NoteController@store');
    });

    Route::group(['prefix' => 'project'], function() {
        Route::post('/', 'API\ProjectController@store');
        Route::post('/{project}/tasks', 'ProjectTaskController@store');
    });

    Route::group(['prefix' => 'reminder'], function() {
        Route::post('/', 'API\ReminderController@store');
    });
});
