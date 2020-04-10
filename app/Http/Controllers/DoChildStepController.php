<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Step;
use App\ChildStep;
use App\DoChildStep;
use Log;

class DoChildStepController extends Controller
{
    //子STEPをクリアした情報をテーブルに新規登録
    public function create(Request $request){
        Log::debug($request);
        $u_id=Auth::id();
        $child_step_id=$request->child_step_id;
        $update=[
            'child_step_id'=>$child_step_id,
            'user_id'=>$u_id
        ];
        DoChildStep::create($update);
    }

    //子STEPをクリアした情報をテーブルから削除
    public function delete(Request $request){
        $u_id=Auth::id();
        $child_step_id=$request->child_step_id;
        DoChildStep::where('child_step_id',$child_step_id)->where('user_id',$u_id)->delete();
    }
}