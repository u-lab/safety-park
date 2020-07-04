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
        $park_path = storage_path('park_data/P13-11_01_GML/KS-META-P13-11_01.xml');
        $word = File::extension($park_path);

        \Log::debug($word);
    //   DB::table('parks')->insert([

    //   ]);
    }
}
