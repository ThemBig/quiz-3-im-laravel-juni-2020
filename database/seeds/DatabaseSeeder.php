<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
          [
            "name" => "user1",
            "email" => "user1@email.com",
            "password" => bcrypt("123456"),
            "followers_id" => "",
            "follow_id" => ""
          ],
          [
            "name" => "user2",
            "email" => "user2@email.com",
            "password" => bcrypt("123456"),
            "followers_id" => "",
            "follow_id" => ""
          ],
          [
            "name" => "user3",
            "email" => "user3@email.com",
            "password" => bcrypt("123456"),
            "followers_id" => "",
            "follow_id" => ""
          ],
        ]);
        $this->call(ArtikelSeeder::class);
    }
}
