<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoStep extends Model
{
    //idカラムのロック
    protected $guarded=['id'];

    //テーブルのリレーション設定
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function step(){
        return $this->belongsTo('App\Step');
    }

}
