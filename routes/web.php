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

// Authencation
// Auth::routes();
Route::post('/login', 'Auth\LoginController@login')->name('auth.login');
Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');


// Home routes
Route::get('/', 'HomeController@indexFront')->name('home');
Route::get('/home', 'HomeController@indexBackend')->name('home.backend');

// Group routes
Route::get('/group/{selector}', 'GroupController@show')->name('group.show');

// Domain Lease routes
Route::get('/verhuur', 'LeaseController@index')->name('lease.index');
Route::get('/verhuur/bereikbaarheid', 'LeaseController@domainAccess')->name('lease.access');
Route::get('/verhuur/aanvragen', 'LeaseController@requestLease')->name('lease.request');
Route::post('/verhuur/toevoegen', 'LeaseController@insertLease')->name('lease.insert');
Route::get('/verhuur/backend', 'LeaseController@leaseBackend')->name('lease.backend');
Route::get('/verhuur/verwijder/{id}', 'LeaseController@deleteLease')->name('lease.delete');
Route::get('/verhuur/bevestigd/{id}', 'LeaseController@setConfirmed')->name('lease.confirm');
Route::get('/verhuur/optie/{id}', 'LeaseController@setOption')->name('lease.option');
Route::get('/verhuur/kalender', 'LeaseController@leaseCalendar')->name('lease.calendar');
Route::get('/verhuur/zoek', 'LeaseController@search')->name('lease.search');

// Activity routes.
Route::get('activiteiten', 'ActivityController@backend')->name('activity.backend');

Route::get('/profiel', 'AccountController@index')->name('account.index');
Route::post('/profiel/informatie', 'AccountController@updateSettings')->name('account.settings');
Route::post('/profiel/security', 'AccountController@updatePassword')->name('account.security');

// Info routes
Route::get('/info/inschrijven', 'InfoController@subscribe')->name('info.subscribe');

// Login authorization routes.
Route::get('/users/index', 'UsersController@index')->name('users.index');
Route::get('/users/delete/{id}', 'UsersController@destroy')->name('account.delete');
Route::get('/users/block/{id}', 'UsersController@userBlock')->name('account.block');
Route::get('/users/unblock/{id}', 'UsersController@userBlock')->name('account.unblock');

// API management routes
Route::get('/api/sleutels', 'ApiKeysController@index')->name('api.keys.index');
Route::get('/api/sleutels/verwijder/{id}', 'ApiKeysController@deleteKey')->name('api.keys.delete');