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
    //TOP一覧画面への遷移
    public function top(){
        //ログイン済みであればマイページへリダイレクト
        if(Auth::check()){
            return redirect('/mypage');
        }
        return view('top');
    }



    //STEP一覧画面への遷移
    public function index(){
        return view('home');
    }



    //マイページへの画面遷移
    public function mypage(){
        //ログイン済みであればマイページへ遷移
        if(Auth::check()){
            return view('mypage');
        }
        return redirect('/step');
    }



    //STEP一覧表示用コンポーネントへのJSON
    public function index_json(){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        //新しい順に並び替え
        $steps=Step::orderBy('id','desc')->where('delete_flg',0)->get();


        foreach($steps as $step){
            $category=$step->category;
            $user=$step->user;
            $count_challenge=$step->count_challenge();
            $count_done=$step->count_done();

            // $auth_user_challenge_doneにログインユーザーがチャレンジ完了しているかを格納
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



    //お気に入りSTEP一覧表示用コンポーネントへのJSON
    public function favorite_json(){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        //チャレンジ数の多い順に並び替え上位5STEPのデータを取得
        $steps=Step::withCount('do_steps')->orderBy('do_steps_count','desc')->where('delete_flg',0)->limit(5)->get();


        foreach($steps as $step){
            $category=$step->category;
            $user=$step->user;
            $count_challenge=$step->count_challenge();
            $count_done=$step->count_done();

            // $auth_user_challenge_doneにログインユーザーがチャレンジ完了しているかを格納
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



    //ログイン中ユーザーが登録したSTEP一覧表示用コンポーネントへのJSON
    public function mystep_json(){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

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



    //チャレンジ中STEP一覧表示用コンポーネントへのJSON
    public function mychallenge_json(){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

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



    //新規作成画面へ遷移
    public function new(){
        $categories=Category::all();
        return view('stepregist',compact('categories'));
    }



    //STEPをDBへ登録
    public function create(StepRequest $request){
        //登録ボタンを押した場合の処理
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

            return redirect()->route('steps.edit',['id'=>$id])->with('flash_message', '登録しました。続いて子STEPを編集してください。');

        //キャンセルボタンを押した場合
        }elseif(isset($request['cancel'])){
            return redirect('/mypage')->with('flash_message', 'キャンセルしました');
        }
    }


    //STEP詳細画面遷移＋データ取得
    public function show($id){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        if(!ctype_digit($id)){
            return redirect('/step')->with('flash_message_alert', '無効な操作が実行されました.');
        };

        //パラメータidからデータ取得
        $step=Step::find($id);
        
        //データが存在しなければリダイレクト
        if($step===null){
            return redirect('/step')->with('flash_message_alert', '無効な操作が実行されました.');
        };
        
        $step['count_challenge']=$step->count_challenge();//チャレンジ中ユーザー数をカウント
        $step['count_done']=$step->count_done(); //チャレンジ済みユーザー数をカウント
        $step['count_child_steps']=$step->count_child_steps();//子STEP数
        $step['auth_user_challenge']=$step->auth_user_challenge();//ログインユーザーのSTEPチャレンジ中判定（done含む）


        //ログインユーザーの子STEPクリア数取得
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



    //STEP詳細画面へのJSON（子STEP情報取得）
    public function show_json($id){
        $step=Step::find($id);
        $child_steps=$step->child_steps;

        //ログインユーザーが各子STEPクリア済みかを判定
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



    //STEP変種画面の情報取得
    public function edit($id){
        //ブラウザバック時にキャッシュクリアしリロード
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0, post-check=0, pre-check=0");
        header("Pragma: no-cache");

        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message_alert', '無効な操作が実行されました.');
        };

        //ログインユーザーの登録STEPかを判定
        $step=Auth::user()->steps()->where('delete_flg',0)->find($id);

        if($step){
            $categories=Category::all();
            return view('stepedit',compact('id','step','categories'));
        }else{
            return redirect('/mypage')->with('flash_message_alert', '無効な操作が実行されました');
        }
       
    }



    //STEP編集画面の情報をDBに登録
    public function update(StepRequest $request,$id){
        // Log::debug($request);

        if(!ctype_digit($id)){
            return redirect('/mypage')->with('flash_message_alert', '無効な操作が実行されました.');
        };
        
        $step=Step::find($id);

        //更新ボタンを押した場合の処理
        if(isset($request['create'])){

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

            
        //削除ボタンを押した場合の処理       
        }elseif(isset($request['cancel'])){

            $step->update(['delete_flg'=>1]);

            // 二重送信対策
            $request->session()->regenerateToken();
            
            return redirect('/mypage')->with('flash_message', '削除しました');
        }
    }
}
