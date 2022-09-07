<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
//Authクラスをインポート
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{

    public function index($id)
    {
         // すべてのフォルダを取得する
        $folders = Auth::user()->folders()->get();
        // dd($id);
        // dd($folders);
        // 選ばれたフォルダを取得する
        $current_folder = Folder::find($id);
        // dd($current_folder);
        // 選ばれたフォルダに紐づくタスクを取得する
        $tasks = $current_folder->tasks()->get();
        $tasks = Task::sortable()->get();
        
        return view('tasks/index',[
            'folders' => $folders,
            'current_folder_id' => $id,
            'tasks' => $tasks,
        ]);
    }
    
    /**
    * GET /folders/{id}/tasks/create
    */
    public function showCreateForm(int $id)
    {
        return view('tasks/create', [
            'folder_id' => $id
        ]);
    }
    
    public function create(int $id, CreateTask $request)
    {

        $current_folder = Folder::find($id);
        
        $task = new Task();
        $task -> title = $request -> title;
        $task -> due_date = $request -> due_date;
      
        $current_folder->tasks()->save($task);
        
        return redirect()->route('tasks.index', [
        'id' => $current_folder->id,
        ]);
        
    }
    
    public function showEditForm(int $id, int $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task,
        ]);
    }
    
    public function edit(int $id, int $task_id, EditTask $request)
    {
        
        //リクエストされた ID でタスクデータを取得
        $task = Task::find($task_id);

        //編集対象のタスクデータにん入力値を詰めて save
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        //編集対象のタスクが属するタスク一覧画面へリダイレクト
        return redirect()->route('tasks.index', [
            'id' => $task->folder_id,
        ]);
    }
    
    public function search(Request $request)
    {

        $tasks = Task::where('title', 'like', "%{$request->search}%")
                ->paginate(3);
        
        // dd($tasks);

        $search_result = $request->search.'の検索結果：'.$tasks->total().'件';

        $first_folder_id = Folder::first();
        // dd($tasks->total());
        return view('tasks.search', [
            'tasks' => $tasks,
            'search_result' => $search_result,
            // 'search_query'  => $request->search
            'first_folder_id' => $first_folder_id,
        ]);
    }

}