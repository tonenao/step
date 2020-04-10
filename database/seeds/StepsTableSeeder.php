<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('steps')->insert([
            
        [
            'title'=>'副業で月30万稼げるようになるまでのステップ',
            'description'=>'収入は増やしたいけど転職は難しいという方向けのノウハウです。',
            'user_id'=>1,
            'achievement_time'=>500,
            'category_id'=>7,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
        [
            'title'=>'人間関係で悩まなくなるシンプルな考え方',
            'description'=>'人間関係の悩みのほとんどは「考え方」を変えることで解決できます！',
            'user_id'=>2,
            'achievement_time'=>100,
            'category_id'=>4,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
        ]);
    }
}
