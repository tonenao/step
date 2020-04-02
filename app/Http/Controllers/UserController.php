<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Log;

class UserController extends Controller
{
    public function show($id){
      $user=User::find($id);//ユーザー情報

      // Log::debug($user);
      return view('profdetail',compact('user'));
    }


    public function edit(){
      $user=Auth::user();
      return view('profedit',compact('user'));
    }

    public function update(Request $request){
      // $validated = $request->validated();
      $user=Auth::user();
      //&nbspLog::debug($request->file('pic'));
      if(!empty($request->file('pic'))){
        $path=$request->file('pic')->store('public/img');
        $data=[
          'name'=>$request->name,
          'email'=>$request->email,
          'introduction'=>$request->introduction,
          'pic'=>basename($path)
        ];
        $user->update($data);
      return redirect('/mypage')->with('flash_message', '更新しました');

      }else{

        $data=[
          'name'=>$request->name,
          'email'=>$request->email,
          'introduction'=>$request->introduction,
        ];
        $user->update($data);
      return redirect('/mypage')->with('flash_message', '画像以外を更新しました');

      }
    }
}






