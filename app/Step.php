<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\DoStep;
use App\ChildStep;
use App\DoChildStep;

class Step extends Model
{
    //idカラムのロック
    protected $guarded=['id'];

    
    //テーブルのリレーション設定
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function child_steps(){
        return $this->hasMany('App\ChildStep');
    }

    public function do_steps(){
        return $this->hasMany('App\DoStep');
    }


    //ログインユーザーのdo_stepsのみを取得
    public function do_steps_auth(){
        $id=Auth::id();
        return $this->hasMany('App\DoStep')->where('user_id',$id);
    }

    //チャレンジ中ユーザー数をカウント
    public function count_challenge(){
        return $this->do_steps->where('status','0')->count();
    }

    //チャレンジ済みユーザー数をカウント
    public function count_done(){
        return $this->do_steps->where('status','1')->count();
    }

    //ログインユーザーのSTEPチャレンジ中判定
    public function auth_user_challenge(){
        $id=Auth::id();
        return $this->do_steps->where('user_id',$id)->count();
    }

    //ログインユーザーのSTEPチャレンジ済み判定
    public function auth_user_challenge_done(){
        $id=Auth::id();
        return $this->do_steps->where('user_id',$id)->where('status','1')->count();
    }

    //子STEP総数カウント
    public function count_child_steps(){
        return $this->child_steps->count();
    }




    
}
