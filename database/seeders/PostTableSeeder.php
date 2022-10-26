<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    private $_posts = [
        ["title" => "Seeder 11", "description" => "Deskripsi seeder 11"],
        ["title" => "Seeder 12", "description" => "Deskripsi seeder 12"],
        ["title" => "Seeder 13", "description" => "Deskripsi seeder 13"],
        ["title" => "Seeder 14", "description" => "Deskripsi seeder 14"],
        ["title" => "Seeder 15", "description" => "Deskripsi seeder 15"],
        ["title" => "Seeder 16", "description" => "Deskripsi seeder 16"],
        ["title" => "Seeder 17", "description" => "Deskripsi seeder 17"],
        ["title" => "Seeder 18", "description" => "Deskripsi seeder 18"],
        ["title" => "Seeder 19", "description" => "Deskripsi seeder 19"],
        ["title" => "Seeder 20", "description" => "Deskripsi seeder 20"]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[];
        foreach ($this->_posts as $post) {
            $data[] = [
                'title' => $post['title'],
                'description' => $post['description']
            ];
        }
        DB::table('posts')->insert($data);
    }
}
