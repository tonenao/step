<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Step;
use App\ChildStep;

class StepsController extends Controller
{
    public function top(){
        return view('top');
    }

    public function index(){
        $steps=Step::orderBy('id','desc')->get();
        return view('home',compact('steps'));
    }

    //一覧ページへのJSON
    public function index_json(){
        $steps=Step::orderBy('id','desc')->get();
        foreach($steps as $step){
            $category=$step->category;
            $user=$step->user;
            $count_challenge=$step->count_challenge();
            $count_done=$step->count_done();

            // $auth_user_challenge_doneにログインユーザーがチャレンジすみかを判定
            if($step->auth_user_challenge_done()){
                $auth_user_challenge_done=true;
            }else{
                $auth_user_challenge_done=false;
            }

            $step['category']=$category;
            $step['user']=$user;
            $step['count_challenge']=$count_challenge;
            $step['count_done']=$count_done;
            $step['auth_user_challenge_done']=$auth_user_challenge_done;
        }
        return $steps->toJson();
    }

    public function mypage(){
        $steps=Step::all();
        return view('mypage',compact('steps'));
    }

    //マイページへのJSON（MYSTEP）
    public function mystep_json(){
        $id=Auth::id();
        $steps=Step::orderBy('id','desc')->where('user_id',$id)->get();
        foreach($steps as $step){
            $category=$step->category;
            $count_challenge=$step->count_challenge();
            $count_done=$step->count_done();
            $step['category']=$category;
            $step['count_challenge']=$count_challenge;
            $step['count_done']=$count_done;
        }
        return $steps->toJson();
    }

    //マイページへのJSON（チャンレンジ中STEP）
    public function mychallenge_json(){
        $id=Auth::id();
        $steps=Step::orderBy('id','desc')->get()->filter(function($step){
            return $step->auth_user_challenge() >0;
        });
        foreach($steps as $step){
            $category=$step->category;
            $count_child_steps=$step->count_child_steps();
            $child_steps=$step->child_steps;
            $count_do_child_steps=0;
            foreach($child_steps as $child_step){
                if($child_step->count_do_child_step()){
                    $count_do_child_steps ++;
                }
            }
            $step['category']=$category;
            $step['count_child_steps']=$count_child_steps;
            $step['count_do_child_steps']=$count_do_child_steps;
        }

        return $steps->toJson();
    }



    public function new(){
        return view('stepregist');
    }

    public function create(Request $request){
        return redirect('/mypage');
    }

    public function show($id){
        $step=Step::find($id);
        $child_steps=$step->child_steps;
        $count_do_child_steps=0;
        foreach($child_steps as $child_step){
            if($child_step->count_do_child_step()){
                $count_do_child_steps ++;
            };
        }
        $step['count_do_child_steps']=$count_do_child_steps;
        return view('stepdetail',compact('id','step'));
    }

    //STEP詳細画面へのJSON
    public function show_json($id){
        $step=Step::find($id);
        $child_steps=$step->child_steps;
        foreach($child_steps as $child_step){
            if($child_step->count_do_child_step()){
                $auth_user_child_step_done=true;
            }else{
                $auth_user_child_step_done=false;
            };
            $child_step['auth_user_child_step_done']=$auth_user_child_step_done;
        }
        return $child_steps->toJson();
    }

    public function edit($id){
        return view('stepedit');
    }

    public function update($id){
        return redirect('/mypage');
    }
}
