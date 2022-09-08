<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Image;
use App\User;

class UserController extends Controller
{
    public function index($id)
    {
        $image = new Image();
        $image = Image::find($id);
        $image = Image::where('user_id',$id)->first();
        return view('users.index', [
            'image' => $image,
        ]);
    }
    
    public function edit($id)
    {
        $auth_id = Auth::id();
    
        $images = Image::find($auth_id);
        // dd($images);
        // $user_id = $image->user_id;
       
     
        return view('users.edit',[
            'images' => $images,
            ]);
    }
}
