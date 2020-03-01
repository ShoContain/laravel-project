<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *ファクトリーで作ったデータベース定義をここに書く
     * @return void
     */
    public function run()
    {
        factory(\App\User::class,3)->create();
    }
}
