<?php

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
        // $this->call(UserSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ParksTableSeeder::class);
        //$this->call(UserLocationTableSeeder::class); //必要となる可能性があるので一応残しています。

    }
}
