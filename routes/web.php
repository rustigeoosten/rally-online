<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/reset', 'HomeController@reset');
Route::get('/changes', 'HomeController@changes');
Route::get('/teams', 'HomeController@teams');
Route::get('/drivers', 'HomeController@drivers');
Route::get('/rallies', 'HomeController@rallies');
Route::get('/myInfo', 'HomeController@myInfo');
Route::post('/myInfo', 'HomeController@myInfoSubmit');
Route::post('/changePoints', 'HomeController@changePoints');
Route::get('/export', 'HomeController@export');
Route::get('/preSeason', 'HomeController@preSeason');

Route::get('/hofDrivers', 'HomeController@hofDrivers');
Route::get('/hofTeams', 'HomeController@hofTeams');

Route::get('/rallies/simulateAll', 'RallyController@simulateAll');
Route::get('/rallies/{rally}/start', 'RallyController@start');
Route::get('/rallies/{rally}/simulate', 'RallyController@simulate');
Route::get('/rallies/{rally}/viewPodium', 'RallyController@viewPodium');
Route::get('/rallies/{rally}/viewResults', 'RallyController@viewResults');
Route::get('/rallies/{rally}/setup', 'RallyController@setup');
Route::post('/rallies/{rally}/confirmSetup', 'RallyController@confirmSetup');
Route::get('/rallies/{rally}/race/{stage}', 'RallyController@race');
Route::get('/rallies/{rally}/race/{stage}/{selectedStage}/{option}', 'RallyController@confirmAction');