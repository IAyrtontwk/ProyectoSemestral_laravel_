<?php

use App\Models\Usuario;
use App\Models\PerfilCongresista;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UsuarioResource;
use App\Http\Controllers\UsuarioController;
use App\Http\Resources\PerfilCongresistaResource;
use App\Http\Controllers\PerfilCongresistaController;
use App\Http\Resources\ProyectoResource;
use App\Http\Controllers\ProyectoController;

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
Route::get('/usuarios', 'UsuarioController@index');
Route::post('/usuarios', 'UsuarioController@store');
Route::get('/perfiles', 'PerfilCongresistaController@index');
Route::get('/perfiles/{perfil}', 'PerfilCongresistaController@show');
Route::post('/perfiles', 'PerfilCongresistaController@store');
Route::post('/proyectos', 'ProyectoController@store');
Route::get('/proyectos', 'ProyectoController@index');
Route::delete('/proyectos/{proyecto}', 'ProyectoController@destroy');
