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
        ini_set("memory_limit", "600M");

        $park_path = storage_path('park_data/P13-11_01_GML/P13-11_01.xml');
        $word = file_get_contents($park_path);
        // $data = mb_convert_encoding($word, 'UTF-8', 'SJIS');
        // $xml_str = str_replace('encoding="Shift_JIS"', 'encoding="UTF-8"', $data );
        // $xml = simplexml_load_string($word);
        $xml = simplexml_load_string($word);

        $name_space = $xml->getNamespaces(true);

        $g_node = $xml->children('gml', true)->Point;
        
        // $data = mb_convert_encoding($xml, 'UTF-8', 'SJIS');
        // $red = get_object_vars($xml);
        
        $parkdata = json_decode(json_encode($xml), true);

        // $value = $xml->identificationInfo->MD_DataIdentification->citation->title;

        \Log::debug($g_node);
    //   DB::table('parks')->insert([

    //   ]);
    }
}
