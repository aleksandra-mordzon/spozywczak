<?php

use Illuminate\Database\Seeder;
use App\Category;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name'=>'owoce', 'slug'=>'owoce', 'isgrocery'=>1],
            ['name'=>'pieczywo', 'slug'=>'pieczywo', 'isgrocery'=>1]
        ]);
    }
}
