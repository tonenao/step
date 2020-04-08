<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\User;
use App\Step;
use Log;

class UserController extends Controller
{
    public function show($id){
      if(!ctype_digit($id)){
        return redirect('/step')->with('flash_message', '無効な操作が実行されました.');
      };

      $user=User::find($id);//ユーザー情報
      
      if($user===null){
        return redirect('/step')->with('flash_message', '無効な操作が実行されました.');
      };

      $count_steps=$user->count_steps();//公開中STEP数
      $steps=$user->published_steps();//公開中STEPのデータ
      
      //公開STEPに対してチャレンジ中の総人数とチャレンジ済みの総人数
      $count_challenge=0;
      $count_done=0;
      foreach($steps as $step){
        $count_challenge += $step->count_challenge();
        $count_done += $step->count_done();
      }
    
      
      //変数userに各数値を格納
      $user['count_steps']=$count_steps;
      $user['count_challenge']=$count_challenge;
      $user['count_done']=$count_done;
      

      
      //STEPに各数値を格納
      foreach($steps as $step){
        $count_challenge=$step->count_challenge();
        $count_done=$step->count_done();

        // $auth_user_challenge_doneにログインユーザーがチャレンジすみかを判定
        if($step->auth_user_challenge_done()){
            $auth_user_challenge_done=true;
        }else{
            $auth_user_challenge_done=false;
        }
        
        $step['count_challenge']=$count_challenge;
        $step['count_done']=$count_done;
        $step['auth_user_challenge_done']=$auth_user_challenge_done;
        $step['category']=$step->category;
      }

      Log::debug($steps);

      return view('profdetail',compact('user','steps'));
    }


    public function edit(){
      if(Auth::check()){
        $user=Auth::user();


        return view('profedit',compact('user'));

      }else{
        return redirect('/step')->with('flash_message', '無効な操作が実行されました.');
      }
    }     


    public function update(Request $request){
      $user=Auth::user();

      if($request->hasFile('pic')){
        // $path=$request->file('pic')->store('public/img');
        $path=$request->base64_encode(file_get_contents($request->pic));
        $data=[
          'name'=>$request->name,
          'email'=>$request->email,
          'introduction'=>$request->introduction,
          'pic'=>basename($path)
        ];
        $user->update($data);

        // 二重送信対策
        $request->session()->regenerateToken();

      return redirect('/mypage')->with('flash_message', '更新しました');

      }else{
        $data=[
          'name'=>$request->name,
          'email'=>$request->email,
          'introduction'=>$request->introduction,
        ];
        $user->update($data);

        // 二重送信対策
        $request->session()->regenerateToken();
        
      return redirect('/mypage')->with('flash_message', '更新しました');

      }
    }
}






