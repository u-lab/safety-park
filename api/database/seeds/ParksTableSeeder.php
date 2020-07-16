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
        $path = [];

        $adm = [[]];
        $lgn = [[]];
        $nop = [[]];
        $kdp = [[]];
        $pop = [[]];
        $cop = [[]];
        $timePosition = [[]];
        $opa = [[]];



        for($j = 0; $j < 48; $j++){
            $em = $j + 1;
            $path[] = 'park_data/P13-11_0'.$em.'_GML/P13-11_0'.$em.'.xml';

            $park_path = storage_path($path[$j]);
            $word = file_get_contents($park_path);
            $xml = simplexml_load_string($word, 'SimpleXMLElement', LIBXML_NOCDATA);
            
            
            
            for($i=1; $i<7161; $i++){
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:adm/text()'))) {
                    $adm[$j][$i-1] = "empty";
                }
                else{
                    $adm_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:adm/text()');
                    $adm[$j][] = $adm_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:lgn/text()'))) {
                    $lgn[$j][$i-1] = "empty";
                }
                else{
                    $lgn_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:lgn/text()');
                    $lgn[$j][] = $lgn_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:nop/text()'))) {
                    $nop[$j][$i-1] = "empty";
                }
                else{
                    $nop_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:nop/text()');
                    $nop[$j][] = $nop_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:kdp/text()'))) {
                    $kdp[$j][$i-1] = "empty";
                }
                else{
                    $kdp_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:kdp/text()');
                    $kdp[$j][] = $kdp_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:pop/text()'))) {
                    $pop[$j][$i-1] = "empty";
                }
                else{
                    $pop_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:pop/text()');
                    $pop[$j][] = $pop_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:cop/text()'))) {
                    $cop[$j][$i-1] = "empty";
                }
                else{
                    $cop_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:cop/text()');
                    $cop[$j][] = $cop_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset[@gml:id="pk'.$i.'"]/ksj:Park/ksj:opd/gml:TimeInstant/gml:timePosition/text()'))) {
                    $timePosition[$j][$i-1] = 0;
                }
                else{
                    $timePosition_part = $xml->xpath('/ksj:Dataset[@gml:id="pk'.$i.'"]/ksj:Park/ksj:opd/gml:TimeInstant/gml:timePosition/text()');
                    $timePosition[$j][] = $timePosition_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:opa/text()'))) {
                    $opa[$j][$i-1] = 0;
                }
                else{
                    $opa_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:opa/text()');
                    $opa[$j][] = $opa_part[0];
                }

                
                $longitude_array = [[]];
                $latitude_array = [[]];
                
                //緯度と経度を足したもの(例:緯度 経度)
                $geometries = $xml->xpath('/ksj:Dataset/gml:Point/gml:pos/text()');
                
                // 6550より少し上にするとエラー
                
                foreach($geometries as $geometry) {
                    [ $latitude, $longitude ] = explode(" ",$geometry);
                    $latitude_array[$j][] = $latitude;
                    $longitude_array[$j][] = $longitude;
                }
                
                
                $max = count($adm[$j]);
                $max_loop = $max/5000;
                $max_count = (int)$max_loop + 1;
                for($loop = 0; $loop < $max_count; $loop++){
                    $list = [[]];
                    $add = $loop === $max_count-1 ?$max%5000:5000;
                    $array_count = $loop * 5000 + $add;
        
                    for($k = $loop * 5000; $k < $array_count; $k++){
                        $list[$j][] = [
                            'adm'=>$adm[$j][$k],
                            'lgn'=>$lgn[$j][$k],
                            'nop'=>$nop[$j][$k],
                            'kdp'=>$kdp[$j][$k],
                            'pop'=>$pop[$j][$k],
                            'cop'=>$cop[$j][$k],
                            'timePosition'=>$timePosition[$j][$k],
                            'opa'=>$opa[$j][$k],
                            'latitude'=>$latitude_array[$j][$k],
                            'longitude'=>$longitude_array[$j][$k],
                        ];
                    } 
                }
            }
        }



        
        for($i = 0; $i < 48; $i++){
            DB::table('parks')->insert(
                $list[$i]
                );
        }
        
        
        // \Log::debug($path);
    }
}
