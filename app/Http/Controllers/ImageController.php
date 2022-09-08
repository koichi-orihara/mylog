<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Http\Requests\ImageRequest; 
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function upload(ImageRequest $request)
    {

       // ディレクトリ名
        $dir = 'sample';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        
         // ファイル情報をDBに保存
        $image = new Image();
        $image = Image::where('user_id',Auth::id())->first();
        // dd($image);
        $image->user_id = Auth::id();
        $image->name = $file_name;
        $image->path = 'storage/' . $dir . '/' . $file_name;
        $image->save();
        $id = Auth::id();
        
        // dd($image);

        return redirect('/users/7/edit')->with('success', '新しいプロフィールを登録しました');
    }
}
