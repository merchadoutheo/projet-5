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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/pronostics', 'PronosticController@showAllProno')->name('prono.index');
Route::post('/proposer-pronostic', 'PronosticController@sendProno')->name('pronostic.send');
Route::get('/prochain-match', 'PronosticController@nextMatch')->name('prono.prochain-match');
Route::get('/Classement', 'HomeController@classement')->name('classement.index');
Route::get('/Classement/match-{id}', 'PronosticController@classement')->name('match.classement');


Route::get('/administration','Admin\userController@index')->name('index.admin');
Route::get('/administration/pronostic','Admin\pronosticController@index')->name('index.admin.pronostic');
Route::get('/administration/user/{id}','Admin\userController@showInfo')->name('user.admin');
Route::get('/administration/user/changeStatut/{id}', 'Admin\userController@changeStatut')->name('user.changeStatut');
