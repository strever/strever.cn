<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //评论
        factory(App\Comment::class, 50)->create();

        //文章分类
        $this->call(CategoriesTableSeeder::class);

        //预置几篇文章
        $this->call(ArticlesTableSeeder::class);

        //超级管理员
        \App\User::create([
            'name' => env('SUPER_ADMIN_NAME'),
            'password' => bcrypt(env('SUPER_ADMIN_PWD')),
        ]);


        //demo管理员
        \App\User::create([
            'name' => env('DEMO_ADMIN_NAME'),
            'password' => bcrypt(env('DEMO_ADMIN_PWD')),
        ]);
    }
}
