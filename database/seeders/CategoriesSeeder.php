<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories= ['Mens Fasshion','Womens Fashion','Child Fashions'];
        for($i=0;$i<count($categories);$i++)
        {
            DB::table('categories')->insert([
                'title' => $categories[$i],
                'slug' =>strtolower($categories[$i]),
                'rank'=>$i+1,
                'created_by'=>1
            ]);
        }
    }
}
