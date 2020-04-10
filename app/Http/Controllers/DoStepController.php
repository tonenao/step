<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Step;
use App\ChildStep;
use App\DoStep;

class DoStepController extends Controller
{
    //チャレンジ中かチャレンジ完了のステータス変更
    public function update(Request $request){
        $u_id=Auth::id();
        $step_id=$request->step_id;
        $status=$request->status;
        DoStep::where('step_id',$step_id)->where('user_id',$u_id)->update(['status'=>$status]);
    }

    //チャレンジ開始し、テーブルに新規登録
    public function challenge(Request $request){
        $u_id=Auth::id();
        $step_id=$request->step_id;
        $status=$request->status;
        $data=[
            'step_id'=>$step_id,
            'user_id'=>$u_id,
            'status'=>$status
        ];
        DoStep::create($data);
    }

    //チャレンジ中止し、テーブルから削除
    public function giveup(Request $request){
        $u_id=Auth::id();
        $step_id=$request->step_id;
        DoStep::where('step_id',$step_id)->where('user_id',$u_id)->delete();
    }
}
