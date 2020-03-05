<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
            'name'=>'naoya tone',
            'email'=>'tonenao@gmail.com',
            'password'=>bcrypt('password'),
            'role'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
        [
            'name'=>'jiro',
            'email'=>'tonenao2@gmail.com',
            'password'=>bcrypt('password'),
            'role'=>5,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
        [
            'name'=>'saburo',
            'email'=>'tonenao3@gmail.com',
            'password'=>bcrypt('password'),
            'role'=>10,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
        [
            'name'=>'shiro',
            'email'=>'tonenao4@gmail.com',
            'password'=>bcrypt('password'),
            'role'=>10,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ],
        [
            'name'=>'goro',
            'email'=>'tonenao5@gmail.com',
            'password'=>bcrypt('password'),
            'role'=>10,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]
        ]);
    }
}
