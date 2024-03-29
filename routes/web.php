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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('abogados', 'AbogadoController')->middleware('auth');

Route::resource('personas', 'PersonaController')->middleware('auth');

Route::resource('juzgados', 'JuzgadoController')->middleware('auth');

Route::resource('expedientes', 'ExpedienteController')->middleware('auth');

Route::resource('mediaciones', 'MediacionController')->middleware('auth');

Route::get('asignarHonorario/{id}','MediacionController@verAsignarHonorarios')->middleware('auth')->name('asignarHonorario.view');

Route::post('asignarHonorario/{id}','MediacionController@asignarHonorarios')->middleware('auth')->name('asignarHonorario.post');

Route::resource('manejoDeFondos', 'ManejoDeFondoController')->middleware('auth');

Route::get('getHonorarios', 'MediacionController@exportarHonorarios')->middleware('auth')->name('mediaciones.excel');
