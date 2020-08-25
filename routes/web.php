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

Route::get('produtos', 'apiproductsController@index');
Route::get('/logistica/login', 'loginController@index');
Route::post('/logistica/login', 'loginController@logar');
Route::get('/logistica/sair', 'loginController@logout');
Route::get('/painel/home', 'painelController@index');