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
/*TEST FUNCIONAMIENTO*/
/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuario/pruebas','UserController@prueba');
Route::get('/categoria/pruebas','CategoryController@prueba');
Route::get('/post/pruebas','PostController@prueba');*/

Route::get('/', 'PostController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'PostController@index']);

/*RUTAS DE USUARIO: LOGIN, REGISTRO, LOGOUT*/
/*RUTAS CATEGORIAS: RESOURCE*/
/*RUTAS POST: RESOURCE-> php artisan route:list */
Route::resource('api/post', 'PostController');
/*Route::get('api/blog', function(){
	return view('list-posts');
});*/
Route::get('api/post/image/{filename}','PostController@getImage');

Route::get('search','SearchController@search');
