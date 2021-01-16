<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('posts')->get()->count() == 0){

            DB::table('posts')->insert([

                [
                    'posttitle' => 'Sample post 1',
                    'postbody' => 'lsdfjaslfj',
                    'slug' => 'sample-post-1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'posttitle' => 'Sample post 2',
                    'postbody' => 'lsdfdfdffjaslfj',
                    'slug' => 'sample-post-2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'posttitle' => 'Another sample post ',
                    'postbody' => 'lsdfjaslfj',
                    'slug' => 'another-sample-post',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
