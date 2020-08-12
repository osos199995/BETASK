<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' =>'iRQM9eCfzXlHuNPDVNmn1jqM5GQOqNY7F6NPiYVodYgSWtTvWmPm6ywJaizSh6Xx',

        ]);
    }
}
