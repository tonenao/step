<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function show($id){
      $user=User::find($id);//ユーザー情報

      // \Log::debug($user);
      return view('profdetail',compact('user'));
    }

    public function edit(){
      $user=Auth::user();
      return view('profedit',compact('user'));
    }

    public function update(Request $request){
      $user=Auth::user();
      // \Log::debug($request);
      // \Log::debug($request->file('pic'));
      \Log::debug($_FILES['pic']);
      // $pic=$request->hasFile('pic');
      // \Log::debug($pic);

      // $data=[
      //   'name'=>$request->name,
      //   'email'=>$request->email,
      //   'introduction'=>$request->introduction,
      // ];
      // $user->update($data);
      return redirect('/mypage')->with('flash_message', '更新しました');
    }
}






