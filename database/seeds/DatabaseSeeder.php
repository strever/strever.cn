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

        //文章种类
        $this->call(CategoriesTableSeeder::class);
    }
}
