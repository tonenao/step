<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoChildStep extends Model
{
    //idカラムのロック
    protected $guarded=['id'];

    //テーブルのリレーション設定
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function child_step(){
        return $this->belongsTo('App\ChildStep');
    }
}
