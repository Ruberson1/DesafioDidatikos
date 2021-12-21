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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});

//products
Route::get('products/', 'ProdutosController@index');
Route::get('products/{id}', 'ProdutosController@show');
Route::post('products/', 'ProdutosController@store');
Route::put('products/{id}', 'ProdutosController@update');
Route::delete('products/{id}', 'ProdutosController@destroy');


//cidades
Route::get('cidades/', 'CidadesController@index');
Route::get('cidades/{id}', 'CidadesController@show');
Route::post('cidades/', 'CidadesController@store');
Route::put('cidades/{id}', 'CidadesController@update');
Route::delete('cidades/{id}', 'CidadesController@destroy');

