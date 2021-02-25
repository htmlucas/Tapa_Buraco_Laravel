<?php

use App\Http\Controllers\ReclamacoesController;
use App\Http\Controllers\UsuarioController;
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

Route::middleware('guest')->group(function(){
    //Login
    Route::get('/login','LoginController@index')->name('login.index');
    Route::post('login','LoginController@login')->name('login.login');

});


    //Login
    Route::get('logout','LoginController@logout')->name('login.logout');

    //Dashboard
    Route::get('dashboard','DashboardController@index')->name('dashboard.index');

    
    //Usuarios
    Route::resource('usuarios','UsuarioController')->middleware('is-admin','is-funcionario');


    //reclamacoes
    Route::put('/reclamacoes/{id}','ReclamacoesController@update')->name('reclamacoes.update');
    Route::get('/reclamacoes/agendamento','ReclamacoesController@agendamento')->name('reclamacoes.agendamento');
    Route::get('/reclamacoes/create','ReclamacoesController@create')->name('reclamacoes.create');
    Route::get('/reclamacoes/{id}/edit','ReclamacoesController@edit')->name('reclamacoes.edit');
    Route::delete('/reclamacoes/{id}','ReclamacoesController@confirm')->name('reclamacoes.confirm');
    Route::get('/reclamacoes','ReclamacoesController@index')->name('reclamacoes.index');
    Route::post('/reclamacoes','ReclamacoesController@store')->name('reclamacoes.store');
    Route::post('/reclamacoes/ordens/{id}','ReclamacoesController@ordens')->name('reclamacoes.ordens');
    Route::get('/reclamacoes/{id}/concerto','ReclamacoesController@concerto')->name('reclamacoes.concerto');
    Route::put('/reclamacoes/concerto/{id}','ReclamacoesController@updateconcerto')->name('reclamacoes.updateconcerto');



    Route::get('/', function () {
        return view('dashboard');
    });









//somente usuario autenticado
Route::middleware('auth')->group(function()
{

});

