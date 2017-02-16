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

Route::get('/profiel', 'AccountController@index')->name('account.index');
Route::post('/profiel/informatie', 'AccountController@updateSettings')->name('account.settings');
Route::post('/profiel/security', 'AccountController@updatePassword')->name('account.security');