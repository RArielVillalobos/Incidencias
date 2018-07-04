<?php

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

Route::get('/reportar','HomeController@report');
Route::post('/reportar','HomeController@postReport');


//Admistracion
Route::group(['middleware'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/usuarios','UserController@index');
    Route::post('/usuarios','UserController@store');

    Route::get('/usuarios/{id}','UserController@edit');

    Route::post('/usuarios/{id}','UserController@update');

    Route::get('/usuarios/{id}/eliminar','UserController@delete');

    Route::get('/proyectos','ProjectController@index');
    Route::post('/proyectos','ProjectController@store');

    Route::get('/proyecto/{id}','ProjectController@edit');
    Route::post('/proyecto/{id}','ProjectController@update');
    Route::get('/projecto/{id}/eliminar','ProjectController@delete');
    Route::Get('/projecto/{id}/restaurar','ProjectController@restore');


    //Category
    Route::post('/categoria/editar','CategoryController@update')->name('category.update');
    Route::post('/categorias','CategoryController@store');
    Route::get('/categoria/{id}/borrar','CategoryController@delete');


    //Level
    Route::post('/niveles','LevelController@store');
    Route::post('/nivel/editar','LevelController@update')->name('level.edit');
    Route::get('/nivel/{id}/borrar','LevelController@delete');

    //Project-User
    Route::post('proyecto-usuario','ProjectUserController@store');
    Route::post('/usuarios/nivel/edit','ProjectUserController@editLevel')->name('proyecto-usuario.level.edit');





    Route::get('/config','ConfigController@index');
});
