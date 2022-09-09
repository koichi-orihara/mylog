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
    
    //ソート(ステータス昇順)
    Route::get('/folders/{id}/tasks/statusAsc', 'TaskController@statusAsc')->name('tasks.statusAsc');
    
    //ソート(ステータス降順)
    Route::get('/folders/{id}/tasks/statusDesc', 'TaskController@statusDesc')->name('tasks.statusDesc');
    
    //ソート(期限昇順)
    Route::get('/folders/{id}/tasks/dueDateAsc', 'TaskController@dueDateAsc')->name('tasks.dueDateAsc');
    
    //ソート(期限昇順)
    Route::get('/folders/{id}/tasks/dueDateDesc', 'TaskController@dueDateDesc')->name('tasks.dueDateDesc');
    
    //論理削除
    Route::get('/folders/{id}/tasks/{task_id}/softDelete', 'TaskController@softDelete')->name('tasks.softDelete');
    
    //ゴミ箱一覧
    Route::get('/softDeleteShow', 'TaskController@softDeleteShow')->name('tasks.softDeleteShow');
    
    //ゴミ箱から復元
    Route::get('/folders/{id}/tasks/{task_id}/restore', 'TaskController@restore')->name('tasks.restore');
    
    //ゴミ箱から削除
    Route::get('/folders/{id}/tasks/{task_id}/physicalDelete', 'TaskController@physicalDelete')->name('tasks.physicalDelete');

});

//認証機能用
    Auth::routes();