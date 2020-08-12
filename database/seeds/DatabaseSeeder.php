<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\seeds\salariesSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(\SalariesSeeder::class);
         $this->call(UserSeeder::class);
    }
}
