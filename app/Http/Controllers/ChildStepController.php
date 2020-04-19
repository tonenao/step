<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ChildStep;
use App\Step;
use App\DoStep;
use Log;


class ChildStepController extends Controller
{
    //子STEPをDBに新規登録
    public function create(Request $request){

        $title=$request->title;
        $step_id=$request->step_id;
        $description=$request->description;
        $data=[
            'title'=>$title,
            'step_id'=>$step_id,
            'description'=>$description
        ];
        ChildStep::create($data);
    }

    //子STEPをDBから削除
    public function delete(Request $request){
        $child_step_id=$request->child_step_id;

        //STEP_IDを取得
        $step_id=ChildStep::where('id',$child_step_id)->value('step_id');

        //取得したSTEPのchild_stepの数をカウント。
        $step=Step::find($step_id);
        $count=$step->count_child_steps();

        //もしchild_stepの数が1の場合、STEPに紐づくDo_stepも全て削除
        if($count===1){
            DoStep::where('step_id',$step_id)->delete();
        }

        //Child_stepを削除
        ChildStep::where('id',$child_step_id)->delete();
    }

    //子STEPの内容更新
        public function update(Request $request,$id){
        $title=$request->title;
        $description=$request->description;
        $child_step=ChildStep::find($id);
        $update=[
            'title'=>$title,
            'description'=>$description
        ];
        $child_step->update($update);
    }
}
