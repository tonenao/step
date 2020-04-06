<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**re
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','pic','introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //id・権限カラムのロック
    protected $guarded=['id','role'];

    //テーブルのリレーション設定
    public function steps(){
        return $this->hasMany('App\Step');
    }

    public function do_steps(){
        return $this->hasMany('App\DoStep');
    }

    public function do_child_steps(){
        return $this->hasMany('App\DoChildStep');
    }



     //ユーザーの公開したSTEP
     public function published_steps(){
        return $this->steps()->where('delete_flg',0)->get();
    }

    //ユーザーの公開したSTEP数のカウント
    public function count_steps(){
        return $this->steps()->where('delete_flg',0)->count();
    }


}
