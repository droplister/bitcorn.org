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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
Route::resource('users', 'UsersController', ['only' => ['update']]);
Route::resource('users.causes', 'UserCausesController', ['only' => ['index']]);
Route::resource('causes', 'CausesController');
Route::resource('elections', 'ElectionsController');
Route::resource('elections.candidates', 'CandidatesController');
Route::resource('events', 'EventsController');
Route::resource('contact', 'ContactController', ['only' => ['create', 'store']]);
Route::get('/about', 'AboutController@index')->name('about.index');
Route::get('/donate', 'DonateController@index')->name('donate.index');
Route::get('/disclaimer', 'PagesController@disclaimer')->name('pages.disclaimer');
Route::get('/privacy', 'PagesController@privacy')->name('pages.privacy');
Route::get('/terms', 'PagesController@terms')->name('pages.terms');