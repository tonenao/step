<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //idカラムのロック
    protected $guarded=['id'];

    //テーブルのリレーション設定
    public function steps(){
        return $this->hasMany('App\Step');
    }
}
