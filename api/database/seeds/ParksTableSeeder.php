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

        $park_path = storage_path('park_data/P13-11_01_GML/P13-11_01.xml');
        $word = file_get_contents($park_path);
        $xml = simplexml_load_string($word, 'SimpleXMLElement', LIBXML_NOCDATA);


        $adm = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:adm/text()');
        $lgn = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:lgn/text()');
        $nop = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:nop/text()');
        $kdp = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:kdp/text()');
        $pop = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:pop/text()');
        $cop = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:cop/text()');
        $timePosition = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:opd/gml:TimeInstant/gml:timePosition/text()');
        $opa = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:opa/text()');

        $latitude_array = [];
        $longitude_array = [];

        //緯度と経度を足したもの(例:緯度 経度)
        $geometries = $xml->xpath('/ksj:Dataset/gml:Point/gml:pos/text()');
    
        // 6550より少し上にするとエラー
        
        
        foreach($geometries as $geometry) {
            [ $latitude, $longitude ] = explode(" ",$geometry);
            $latitude_array[] = $latitude;
            $longitude_array[] = $longitude;
        }
        
        
        $max = count($adm);
        $max_loop = $max/5000;
        $max_count = (int)$max_loop + 1;
        for($loop = 0; $loop < $max_count; $loop++){
            $list = [];
            $add = $loop === $max_count-1 ?$max%5000:5000;
            $array_count = $loop * 5000 + $add;

            for($i = $loop * 5000; $i < $array_count; $i++){
                $list[] = [
                    'adm'=>$adm[$i],
                    'lgn'=>$lgn[$i],
                    'nop'=>$nop[$i],
                    'kdp'=>$kdp[$i],
                    'pop'=>$pop[$i],
                    'cop'=>$cop[$i],
                    'timePosition'=>$timePosition[$i],
                    'opa'=>$opa[$i],
                    'latitude'=>$latitude_array[$i],
                    'longitude'=>$longitude_array[$i],
                ];
            }
            DB::table('parks')->insert(
            $list
            );
        }

        // \Log::debug($list);
         
        
    }
}
