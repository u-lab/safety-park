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
        $word = file_get_contents($park_path);
        // $data = mb_convert_encoding($word, 'UTF-8', 'SJIS');
        // $xml_str = str_replace('encoding="Shift_JIS"', 'encoding="UTF-8"', $data );
        $xml = simplexml_load_string($word);
        
        $data = mb_convert_encoding($xml, 'UTF-8', 'SJIS');
        $red = get_object_vars($xml);
        
        $parkdata = json_decode(json_encode($xml), true);

        \Log::debug($parkdata);
    //   DB::table('parks')->insert([

    //   ]);
    }
}
