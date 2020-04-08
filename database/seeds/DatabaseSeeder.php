<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(StepsTableSeeder::class);
        // $this->call(ChildStepsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
    }
}
