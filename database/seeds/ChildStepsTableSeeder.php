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
                'title'=>'苦手の理由を把握する',
                'description'=>'苦手の理由を把握する',
                'step_id'=>7,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'苦手の理由を交換する',
                'description'=>'苦手の理由を交換する',
                'step_id'=>7,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'相手の視点で自分を見つめる',
                'description'=>'相手の視点で自分を見つめる',
                'step_id'=>7,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'挨拶から変えていく',
                'description'=>'挨拶から変えていく',
                'step_id'=>7,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'相手の価値観を把握する',
                'description'=>'相手の価値観を把握する',
                'step_id'=>7,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'相手を承認する',
                'description'=>'相手を承認する',
                'step_id'=>7,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'情報を集める',
                'description'=>'情報を集める',
                'step_id'=>6,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'title'=>'簡単なものから始めてみる',
                'description'=>'簡単なものから始めてみる',
                'step_id'=>6,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],            
            [
                'title'=>'最初はとにかくコツコツ続ける',
                'description'=>'最初はとにかくコツコツ続ける',
                'step_id'=>6,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],            
            [
                'title'=>'効率化を進める',
                'description'=>'効率化を進める',
                'step_id'=>6,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],

        ]);
    }
}
