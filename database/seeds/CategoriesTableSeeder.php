<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            1 => 'php',
            2 => 'frontend',
            3 => 'unix-like',
            5 => 'mac',
            6 => 'database',
            7 => '工具',
            8 => 'windows',
            9 =>'杂谈',
        ];

        foreach($categories as $id => $name)
        {
            \App\Category::insert([
                'id' => $id,
                'name' => $name
            ]);
        }





    }
}
