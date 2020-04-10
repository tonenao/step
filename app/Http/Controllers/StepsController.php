<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StepRequest;
use App\Step;
use App\ChildStep;
use App\DoStep;
use App\Category;
use Log;

class StepsController extends Controller
{

    public function top(){
        return view('top');
    }

    public function index(){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        $steps=Step::orderBy('id','desc')->where('delete_flg',0)->get();
        return view('home',compact('steps'));
    }

    //STEP一覧へのJSON
    public function index_json(){
        $steps=Step::orderBy('id','desc')->where('delete_flg',0)->get();
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

    //お気に入りSTEP一覧へのJSON
    public function favorite_json(){
        $steps=Step::withCount('do_steps')->orderBy('do_steps_count','desc')->where('delete_flg',0)->limit(5)->get();
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
        return view('mypage');
    }


    //マイページへのJSON（MYSTEP）
    public function mystep_json(){
        $id=Auth::id();
        $steps=Step::orderBy('id','desc')->where('user_id',$id)->where('delete_flg',0)->get();
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
        $steps=Step::orderBy('id','desc')->where('delete_flg',0)->get()->filter(function($step){
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
            if($count_child_steps===$count_do_child_steps){
                $step['check_done']=true;
            }else{
                $step['check_done']=false;
            }
        }
        return $steps->toJson();
    }



    public function new(){
        $categories=Category::all();
        return view('stepregist',compact('categories'));
    }




    public function create(StepRequest $request){
        if(isset($request['create'])){
            $data=[
                'title'=>$request->title,
                'category_id'=>$request->category_id,
                'achievement_time'=>$request->achievement_time,
                'description'=>$request->description,
                'user_id'=>Auth::id()
            ];
            $step=Step::create($data);
            $id=$step->id;
            
            // 二重送信対策
            $request->session()->regenerateToken();

            return redirect()->route('steps.edit',['id'=>$id])->with('flash_message', '登録しました。続いて子STEPを編集してください。<br>【※注】一度登録した子STEPは編集は可能ですが削除できません');
        }elseif(isset($request['cancel'])){
            return redirect('/mypage')->with('flash_message', 'キャンセルしました');
        }
    }




    public function show($id){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        if(!ctype_digit($id)){
            return redirect('/step')->with('flash_message', '無効な操作が実行されました.');
        };

        $step=Step::find($id);
        
        if($step===null){
            return redirect('/step')->with('flash_message', '無効な操作が実行されました.');
        };
        
        $step['count_challenge']=$step->count_challenge();
        $step['count_done']=$step->count_done();
        $step['count_child_steps']=$step->count_child_steps();
        $step['auth_user_challenge']=$step->auth_user_challenge();

        if(isset($step->do_steps_auth[0])){
        $step['do_steps_auth']=$step->do_steps_auth[0];}
        
        $count_do_child_steps=0;
        $child_steps=$step->child_steps;
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
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message', '無効な操作が実行されました.');
        };

        if(!Auth::check()){
            return redirect('/mypage')->with('flash_message', '無効な操作が実行されました.');
        };

        $step=Auth::user()->steps()->where('delete_flg',0)->find($id);

        if($step){
            $categories=Category::all();
            return view('stepedit',compact('id','step','categories'));
        }else{
            return redirect('/mypage')->with('flash_message', '無効な操作が実行されました');
        }
       
    }


    public function update(StepRequest $request,$id){
        // Log::debug($request);

        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message', '無効な操作が実行されました.');
        };
        
        $step=Step::find($id);

        if(isset($request['create'])){
            // Log::debug('データ更新');
            $data=[
                'title'=>$request->title,
                'category_id'=>$request->category_id,
                'achievement_time'=>$request->achievement_time,
                'description'=>$request->description
            ];
            $step->update($data);

            // 二重送信対策
            $request->session()->regenerateToken();
            return redirect('/mypage')->with('flash_message', '更新しました');

        }elseif(isset($request['cancel'])){
            // Log::debug('削除');
            $step->update(['delete_flg'=>1]);
            // \Log::debug($step->delete_flg);

            // 二重送信対策
            $request->session()->regenerateToken();
            
            return redirect('/mypage')->with('flash_message', '削除しました');
        }
    }
}
