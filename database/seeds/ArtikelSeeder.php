<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikels')->insert([
            [
                'user_id' => 1,
                'judul' => Str::random(10),
                'isi' => Str::random(30),
                'slug' => Str::random(10),
                'tag' => Str::random(20),
            ],
            [
                'user_id' => 1,
                'judul' => Str::random(10),
                'isi' => Str::random(30),
                'slug' => Str::random(10),
                'tag' => Str::random(20),
            ],
            [
                'user_id' => 1,
                'judul' => "Cara Menggunakan Blade",
                'isi' => "Buka dokumentasi pada laravel yang anda gunakan",
                'slug' => "cara-menggunakan-blade",
                'tag' => "info,web,laravel",
            ]
        ]);
    }
}
