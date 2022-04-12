<?php

use Database\Seeders\AdminSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(\Database\Seeders\AdminSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call([AdminSeeder::class]);

    }
}
