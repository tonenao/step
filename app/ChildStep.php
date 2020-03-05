<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildStep extends Model
{
    //idカラムのロック
    protected $guarded=['id'];
    
    //テーブルのリレーション設定
    public function step(){
        return $this->belongsTo('App\Step');
    }
}
