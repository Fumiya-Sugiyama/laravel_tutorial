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

// TODO
Route::get('/', 'TodoController@index');
Route::get('/create', 'TodoController@create');
Route::post('/create-todo', 'TodoController@createTodo');
Route::get('/done-todo/{id}', 'TodoController@doneTodo');
Route::get('/detail/{id}', 'TodoController@detail');
Route::get('/edit/{id}', 'TodoController@edit');
Route::post('/edit-todo', 'TodoController@editTodo');
Route::get('/delete/{id}', 'TodoController@delete');
Route::post('/delete-todo/{id}', 'TodoController@deleteTodo');
Route::post('/search-todo/{description}', 'TodoController@searchTodo');
Auth::routes();

// AUTH
Route::get('/home', 'HomeController@index')->name('home');
