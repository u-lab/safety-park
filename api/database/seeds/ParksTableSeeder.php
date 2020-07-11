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
        // ini_set("memory_limit", "600M");

        $park_path = storage_path('park_data/P13-11_01_GML/P13-11_01.xml');
        $word = file_get_contents($park_path);
        $data = mb_convert_encoding($word, 'UTF-8', 'SJIS');

        // $xml_str = str_replace('encoding="Shift_JIS"', 'encoding="UTF-8"', $data );
        // $xml = simplexml_load_string($word);

        $xml = simplexml_load_string($word, 'SimpleXMLElement', LIBXML_NOCDATA);

        $name_space = $xml->getNamespaces(true);

        // $g_node = $xml->children('gml', true)->Point;

        // $data = mb_convert_encoding($xml, 'UTF-8', 'SJIS');
        // $red = get_object_vars($xml);
        
        $parkdata = json_decode(json_encode($xml), true);

        // $value = $xml->identificationInfo->MD_DataIdentification->citation->title;

        $adm = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:adm/text()');
        $lgn = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:lgn/text()');
        $nop = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:nop/text()');
        $kdp = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:kdp/text()');
        $pop = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:pop/text()');
        $cop = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:cop/text()');
        $timePosition = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:opd/gml:TimeInstant/gml:timePosition/text()');
        $opa = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:opa/text()');

        $latitude = [];
        $longitude = [];

        $le = $xml->xpath('/ksj:Dataset/gml:Point/gml:pos/text()');

        $ss = [];
        $max = 6560;
        // 6550より少し上にするとエラー


        for($i = 0; $i< $max; $i++){
            $ss = array_merge($ss, array(explode(" ",$le[$i])));
        }

        for($i = 0; $i< $max; $i++){
            $latitude = array_merge($latitude, array($ss[$i][0]));
            $longitude = array_merge($longitude, array($ss[$i][1]));
        }
        // $places = explode(" ",(array)$le);

       


        $group = array(
            $adm[0],
            $lgn[0],
            $nop[0],
            $kdp[0],
            $pop[0],
            $cop[0],
            $timePosition[0],
            $opa[0],
            $latitude[0],
            $longitude[0]
        );

        \Log::debug($ss[0][1]);

        $list = [];

        for($i = 0; $i < $max;$i++){
            $list = array_merge($list, array([
                'adm'=>$adm[$i],
                'lgn'=>$lgn[$i],
                'nop'=>$nop[$i],
                'kdp'=>$kdp[$i],
                'pop'=>$pop[$i],
                'cop'=>$cop[$i],
                'timePosition'=>$timePosition[$i],
                'opa'=>0,
                'latitude'=>$latitude[$i],
                'longitude'=>$longitude[$i],
            ]));
        }
         
        
        DB::table('parks')->insert(
        $list
        );
    }
}
