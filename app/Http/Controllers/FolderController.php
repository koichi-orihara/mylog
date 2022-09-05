<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder; 
use App\Http\Requests\CreateFolder;
//Authクラスをインポートする
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }
    
    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
       
        // タイトルに入力値を代入する
        $folder->title = $request->title;
        
        // インスタンスの状態をデータベースに書き込む
        Auth::user()->folders()->save($folder);
        
        return redirect()->route('tasks.index', [
        'id' => $folder->id,
        ]);
    }
    
    public function destroy($id) 
    {
        // dd($id);
         // idの値でメッセージを検索して取得
        $folder = Folder::findOrFail($id);
        // dd($folder);
        // フォルダーを削除
        $a = $folder->delete();
        // dd($a);
        // dd($id);
        $current_folder = Folder::first();
        // dd($current_folder);
        
         if (is_null($current_folder)) {
            return view('home');
        } 
        
        return redirect()->route('tasks.index', [
            'id' => $current_folder,
        ]);
    }
}
