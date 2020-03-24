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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes(['reset'=>false]);
Route::get('/home', 'HomeController@index')->name('home');

//controladores 
Route::resource('incidencia','IncidenciaController')->middleware('auth');
Route::resource('agenteinc','AgenteincController')->middleware('auth');
Route::resource('tecnicoinc','TecnicoincController')->middleware('auth');
Route::resource('mantenimiento','MantenimientoController')->middleware('auth');
