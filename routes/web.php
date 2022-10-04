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

Route::group(['middleware' => 'auth'], function(){

    Route::group(['prefix'=>'paises', 'where'=>['id'=>'[0-9]+']], function() {
    
        Route::any('',              ['as'=>'paises',            'uses'=>'\App\Http\Controllers\PaisesController@index'  ]);
        Route::get('create',        ['as'=>'paises.create',     'uses'=>'\App\Http\Controllers\PaisesController@create' ]);
        Route::get('{id}/destroy',  ['as'=>'paises.destroy',    'uses'=>'\App\Http\Controllers\PaisesController@destroy']);
        Route::get('edit',          ['as'=>'paises.edit',       'uses'=>'\App\Http\Controllers\PaisesController@edit'   ]);
        Route::put('{id}/update',   ['as'=>'paises.update',     'uses'=>'\App\Http\Controllers\PaisesController@update' ]);
        Route::post('store',        ['as'=>'paises.store',      'uses'=>'\App\Http\Controllers\PaisesController@store'  ]);
    
    });

    Route::group(['prefix'=>'receitas', 'where'=>['id'=>'[0-9]+']], function() {
    
        Route::any('',              ['as'=>'receitas',            'uses'=>'\App\Http\Controllers\ReceitasController@index'  ]);
        Route::get('create',        ['as'=>'receitas.create',     'uses'=>'\App\Http\Controllers\ReceitasController@create' ]);
        Route::get('{id}/destroy',  ['as'=>'receitas.destroy',    'uses'=>'\App\Http\Controllers\ReceitasController@destroy']);
        Route::get('edit',          ['as'=>'receitas.edit',       'uses'=>'\App\Http\Controllers\ReceitasController@edit'   ]);
        Route::put('{id}/update',   ['as'=>'receitas.update',     'uses'=>'\App\Http\Controllers\ReceitasController@update' ]);
        Route::post('store',        ['as'=>'receitas.store',      'uses'=>'\App\Http\Controllers\ReceitasController@store'  ]);
    
    });

    Route::group(['prefix'=>'dicas', 'where'=>['id'=>'[0-9]+']], function() {

        Route::any('',              ['as'=>'dicas',            'uses'=>'\App\Http\Controllers\DicasController@index'  ]);
        Route::get('create',        ['as'=>'dicas.create',     'uses'=>'\App\Http\Controllers\DicasController@create' ]);
        Route::get('{id}/destroy',  ['as'=>'dicas.destroy',    'uses'=>'\App\Http\Controllers\DicasController@destroy']);
        Route::get('edit',          ['as'=>'dicas.edit',       'uses'=>'\App\Http\Controllers\DicasController@edit'   ]);
        Route::put('{id}/update',   ['as'=>'dicas.update',     'uses'=>'\App\Http\Controllers\DicasController@update' ]);
        Route::post('store',        ['as'=>'dicas.store',      'uses'=>'\App\Http\Controllers\DicasController@store'  ]);
    
    });
    
    Route::group(['prefix'=>'generos', 'where'=>['id'=>'[0-9]+']], function() {
    
        Route::any('',              ['as'=>'generos',            'uses'=>'\App\Http\Controllers\GenerosController@index'  ]);
        Route::get('create',        ['as'=>'generos.create',     'uses'=>'\App\Http\Controllers\GenerosController@create' ]);
        Route::get('{id}/destroy',  ['as'=>'generos.destroy',    'uses'=>'\App\Http\Controllers\GenerosController@destroy']);
        Route::get('edit',          ['as'=>'generos.edit',       'uses'=>'\App\Http\Controllers\GenerosController@edit'   ]);
        Route::put('{id}/update',   ['as'=>'generos.update',     'uses'=>'\App\Http\Controllers\GenerosController@update' ]);
        Route::post('store',        ['as'=>'generos.store',      'uses'=>'\App\Http\Controllers\GenerosController@store'  ]);
    
    });
    
    Route::get('home', '\App\Http\Controllers\InicioController@index');
    
    Route::group(['prefix'=>'nacionalidades', 'where'=>['id'=>'[0-9]+']], function() {
    
        Route::any('',              ['as'=>'nacionalidades',            'uses'=>'\App\Http\Controllers\NacionalidadesController@index'  ]);
        Route::get('create',        ['as'=>'nacionalidades.create',     'uses'=>'\App\Http\Controllers\NacionalidadesController@create' ]);
        Route::get('{id}/destroy',  ['as'=>'nacionalidades.destroy',    'uses'=>'\App\Http\Controllers\NacionalidadesController@destroy']);
        Route::get('edit',          ['as'=>'nacionalidades.edit',       'uses'=>'\App\Http\Controllers\NacionalidadesController@edit'   ]);
        Route::put('{id}/update',   ['as'=>'nacionalidades.update',     'uses'=>'\App\Http\Controllers\NacionalidadesController@update' ]);
        Route::post('store',        ['as'=>'nacionalidades.store',      'uses'=>'\App\Http\Controllers\NacionalidadesController@store'  ]);
    
    });
    
    Route::group(['prefix'=>'autores', 'where'=>['id'=>'[0-9]+']], function() {
    
        Route::any('',              ['as'=>'autores',            'uses'=>'\App\Http\Controllers\AutoresController@index'  ]);
        Route::get('create',        ['as'=>'autores.create',     'uses'=>'\App\Http\Controllers\AutoresController@create' ]);
        Route::get('{id}/destroy',  ['as'=>'autores.destroy',    'uses'=>'\App\Http\Controllers\AutoresController@destroy']);
        Route::get('edit',          ['as'=>'autores.edit',       'uses'=>'\App\Http\Controllers\AutoresController@edit'   ]);
        Route::put('{id}/update',   ['as'=>'autores.update',     'uses'=>'\App\Http\Controllers\AutoresController@update' ]);
        Route::post('store',        ['as'=>'autores.store',      'uses'=>'\App\Http\Controllers\AutoresController@store'  ]);
    
    });

});