<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data[] = [
           'title' => 'Без категории',
           'slug' => 'bez-kategory',
           'parent_id' => 0,

       ];

       for ($i = 0; $i < 10; $i++){
           $data[] = [
               'title' => "Категория №$i",
               'slug' => "kategory-$i",
               'parent_id' => (rand(1,10))
           ];
       }

       DB::table('blog_category_models')->insert($data);
    }
}
