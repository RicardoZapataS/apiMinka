<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['api'])->group(function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

    Route::post('categoria', 'CategoriaController@store');
    Route::get('categoria', 'CategoriaController@index');
    Route::get('categoria/{id}', 'CategoriaController@show');
    Route::post('categoria/{id}', 'CategoriaController@update');
    Route::delete('categoria/{id}', 'CategoriaController@destroy');

    Route::post('habilidad', 'HabilidadController@store');
    Route::get('habilidad', 'HabilidadController@index');
    Route::get('habilidad/{id}', 'HabilidadController@show');
    Route::post('habilidad/{id}', 'HabilidadController@update');
    Route::delete('habilidad/{id}', 'HabilidadController@destroy');

    Route::post('permiso', 'PermisoController@store');
    Route::get('permiso', 'PermisoController@index');
    Route::get('permiso/{id}', 'PermisoController@show');
    Route::post('permiso/{id}', 'PermisoController@update');
    Route::delete('permiso/{id}', 'PermisoController@destroy');

    Route::post('permiso-denegado-por-rol', 'PermisoDenegadoPorRolController@store');
    Route::get('permiso-denegado-por-rol', 'PermisoDenegadoPorRolController@index');
    Route::get('permiso-denegado-por-rol/{id}', 'PermisoDenegadoPorRolController@show');
    Route::post('permiso-denegado-por-rol/{id}', 'PermisoDenegadoPorRolController@update');
    Route::delete('permiso-denegado-por-rol/{id}', 'PermisoDenegadoPorRolController@destroy');

    Route::post('rol', 'RolController@store');
    Route::get('rol', 'RolController@index');
    Route::get('rol/{id}', 'RolController@show');
    Route::post('rol/{id}', 'RolController@update');
    Route::delete('rol/{id}', 'RolController@destroy');

    Route::post('servicio', 'ServicioController@store');
    Route::get('servicio', 'ServicioController@index');
    Route::get('servicio/{id}', 'ServicioController@show');
    Route::post('servicio/{id}', 'ServicioController@update');
    Route::delete('servicio/{id}', 'ServicioController@destroy');
    
    Route::post('trabajo-asignado', 'TrabajoAsignadoController@store');
    Route::get('trabajo-asignado', 'TrabajoAsignadoController@index');
    Route::get('trabajo-asignado/{id}', 'TrabajoAsignadoController@show');
    Route::post('trabajo-asignado/{id}', 'TrabajoAsignadoController@update');
    Route::delete('trabajo-asignado/{id}', 'TrabajoAsignadoController@destroy');
});

