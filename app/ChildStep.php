<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\DoChildStep;

class ChildStep extends Model
{
    //idカラムのロック
    protected $guarded=['id'];
    
    //テーブルのリレーション設定
    public function step(){
        return $this->belongsTo('App\Step');
    }

    public function do_child_steps(){
        return $this->hasMany('App\DoChildStep');
    }

    //子STEPチャレンジ中の総数カウント
    public function count_do_child_step(){
        $id=Auth::id();
        return $this->do_child_steps()->where('user_id',$id)->count();
    }
}
