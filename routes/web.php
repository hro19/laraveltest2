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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/samples','samplesController@index')->name('samples.index');
Route::get('/samples/create', 'samplesController@showCreateForm')->name('samples.create');
Route::post('/samples/create', 'samplesController@create');
Route::get('/samples/{id}','samplesController@show');

Route::group(['middleware' => 'auth'], function() {

	Route::get('/', 'HomeController@index')->name('home');

	Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

	Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
	Route::post('/folders/create', 'FolderController@create');

	Route::get('/folders/{id}/destroy', 'FolderController@destroy')->name('folders.destroy');

	Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
	Route::post('/folders/{id}/tasks/create', 'TaskController@create');

	Route::get('/folders/{id}/tasks/{task_id}', 'TaskController@showTask')->name('tasks.show');


	Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
	Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');

	Route::get('/folders/{id}/tasks/{task_id}/delete', 'TaskController@delete')->name('tasks.delete');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
