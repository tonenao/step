<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildStepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('child_steps')->insert([
            [
                'title'=>'情報を集める',
                'description'=>'ベストなのは信頼できる人からの情報。人脈がない段階ではWEBや書籍での情報収集となると思うが、まずは多くの情報に触れ流ことが重要。',
                'step_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'簡単なものから始めてみる',
                'description'=>'情報は玉石混合。そのため見極めるスキルも必要だが最初から失敗しないようにと考えすぎると、行動できずに時間だけがどんどん過ぎてしまう。ある程度失敗することも想定しつつ、どこかで決断して進むことが大切',
                'step_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],            
            [
                'title'=>'最初はとにかくコツコツ続ける',
                'description'=>'最初から一攫千金を狙うのはリスクがある。まずは少額でも増やし、継続し続けることが大切です。',
                'step_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],            
            [
                'title'=>'効率化を進める',
                'description'=>'同じ作業にかける時間を短くするか、同じ時間でより単価の高い仕事をするか。それを進めることで収入は増えていくはずです。',
                'step_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'苦手の理由を把握する',
                'description'=>'最初のステップはあなたがその人を苦手だと思っている理由（要素）を知ることからです。客観的に見つめて「その人を苦手だと思うところ」「どうしてそう思うのか」紙に書き出していきましょう。',
                'step_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'苦手の理由を交換する',
                'description'=>'Step１で書き出した、相手の苦手なところの、それぞれに対して自分自身に質問をして答えを書いていきましょう。問いかける質問は例えば「いつもそうなのか？」「他の誰もがそう思っているか？」「プラスの見方に変えてみると？」などです。',
                'step_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'相手の視点で自分を見つめる',
                'description'=>'対人関係を克服することにおいては相手を知ることも欠かせません。自分と異なる相手の立場や役割に自分も立ってみて相手への理解を深めたり、互いの関係を変化させていくことが重要です。お勧めなのはNLPのポジショニングというカウンセリング手法。',
                'step_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'挨拶から変えていく',
                'description'=>'当たり前のように行う「おはようございます」「お疲れ様です」などの挨拶は少しずつ変化を取り入れることができる要素です。苦手だな、避けたいなと思っている相手に対して、私たちは普通に接しているつもりでも、無意識に不自然さや違和感というものが表\れてしまいがちです。そういう雰囲気は必ず相手にも伝わるもの。苦手を克服して関係を良くしていくために、少しずつ挨拶から慣らしていきましょう。',
                'step_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'相手の価値観を把握する',
                'description'=>'対人関係の苦手や、溝を作ってしまう理由の１つには「価値観の違い」があります。しかしお互いに許容できない、譲れないままでは、関係性は改善していきません。まずはあなたの方から、相手が大事にしている価値観を理解し、尊重するように接していきましょう。あらゆるシーンで関係がスムーズになります。',
                'step_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'相手を承認する',
                'description'=>'相手との関係性を良くしていく上で核心となるのが、この「承認する」というステップです。「承認」がなぜ核心になるのか？というと、私たち人間には、自分自身のことを価値のある存在だと思っていたい、そして他人からも自分のことを価値のある存在だと認めてもらいたい、という強い心理欲求があります。',
                'step_id'=>2,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],

        ]);
    }
}
