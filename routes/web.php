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

Route::group(['middleware' => 'auth'], function() {
    //ホーム画面
    Route::get('/', 'HomeController@index')->name('home');
    
    Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
    
    //フォルダ作成機能
    Route::get('/folders/create', 'FolderController@showCreateForm');
    Route::post('/folders/create', 'FolderController@create')->name('folders.create');
    
    //フォルダ削除機能
    Route::delete('/folders/{id}', 'FolderController@destroy')->name('folders.destroy');
    
    //タスクの新規作成機能
    Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', 'TaskController@create');

    //タスクの一覧機能
    Route::get('/folders/{id}/tasks/{task_id}/show', 'TaskController@show')->name('tasks.show');
    
    //タスクの編集機能
    Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');
    
    //タスク検索機能
    Route::get('/tasks/search', 'TaskController@search')->name('tasks.search');
    
    //ユーザー詳細画面
    Route::get('/users/{id}/index', 'UserController@index')->name('users.index');
    
    //画像
    Route::post('/upload', 'ImageController@upload')->name('upload');
    
    //ユーザー情報編集画面
    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
    
});

//認証機能用
    Auth::routes();