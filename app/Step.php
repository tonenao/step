<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


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

    public function chiid_steps(){
        return $this->hasMany('App\ChildStep');
    }

    
}
