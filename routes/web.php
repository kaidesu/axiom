<?php

$users = App\User::count();

$authSettings = [
    'register' => true,
];

if ($users > 0) {
    $authSettings['register'] = false;
}

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('/projects', 'ProjectController@index');
    Route::get('/projects/create', 'ProjectController@create');
    Route::get('/projects/{project}', 'ProjectController@show');
    Route::post('/projects', 'ProjectController@store');

    Route::get('/reminders', 'ReminderController@index')->name('reminders.index');
    Route::get('/reminders/create', 'ReminderController@create')->name('reminders.create');
    Route::post('/reminders', 'ReminderController@store')->name('reminders.store');
    Route::delete('/reminders/{reminder}', 'ReminderController@destroy')->name('reminders.destroy');
});

Auth::routes($authSettings);
