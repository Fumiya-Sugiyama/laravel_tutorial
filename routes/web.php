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

Route::get('/', 'TodoController@index');
Route::get('/create', 'TodoController@create');
Route::post('/create-todo', 'TodoController@createTodo');
Route::get('/done-todo/{id}', 'TodoController@doneTodo');
Route::get('/detail/{id}', 'TodoController@detail');