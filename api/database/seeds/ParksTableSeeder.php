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
        //各公園データのデフォルト値
        $DEFAULT_EMPTY_STR = "empty";
        $DEFAULT_EMPTY_NUMBER = 0;
        
        
        for($prefecture_arr_num = 0; $prefecture_arr_num < 47; $prefecture_arr_num++){
            
            $adm = [];
            $lgn = [];
            $nop = [];
            $kdp = [];
            $pop = [];
            $cop = [];
            $timePosition = [];
            $opa = [];
            
            $longitude_array = [];
            $latitude_array = [];

            $prefecture_num = $prefecture_arr_num + 1;
            $path = 'park_data/P13-11_0'.$prefecture_num.'_GML/P13-11_0'.$prefecture_num.'.xml';
            
            $park_path = storage_path($path);
            $word = file_get_contents($park_path);
            $xml = simplexml_load_string($word, 'SimpleXMLElement', LIBXML_NOCDATA);
            
            $count_adm = $xml->xpath('/ksj:Dataset/ksj:Park/ksj:adm/text()');
            
            
            
            for($i=1; $i<count($count_adm); $i++){
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:adm/text()'))) {
                    $adm[] = $DEFAULT_EMPTY_STR;
                }
                else{
                    $adm_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:adm/text()');
                    $adm[] = $adm_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:lgn/text()'))) {
                    $lgn[] = $DEFAULT_EMPTY_STR;
                }
                else{
                    $lgn_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:lgn/text()');
                    $lgn[] = $lgn_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:nop/text()'))) {
                    $nop[] = $DEFAULT_EMPTY_STR;
                }
                else{
                    $nop_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:nop/text()');
                    $nop[] = $nop_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:kdp/text()'))) {
                    $kdp[] = $DEFAULT_EMPTY_STR;
                }
                else{
                    $kdp_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:kdp/text()');
                    $kdp[] = $kdp_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:pop/text()'))) {
                    $pop[] = $DEFAULT_EMPTY_STR;
                }
                else{
                    $pop_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:pop/text()');
                    $pop[] = $pop_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:cop/text()'))) {
                    $cop[] = $DEFAULT_EMPTY_STR;
                }
                else{
                    $cop_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:cop/text()');
                    $cop[] = $cop_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset[@gml:id="pk'.$i.'"]/ksj:Park/ksj:opd/gml:TimeInstant/gml:timePosition/text()'))) {
                    $timePosition[] = $DEFAULT_EMPTY_NUMBER;
                }
                else{
                    $timePosition_part = $xml->xpath('/ksj:Dataset[@gml:id="pk'.$i.'"]/ksj:Park/ksj:opd/gml:TimeInstant/gml:timePosition/text()');
                    $timePosition[] = $timePosition_part[0];
                }
                if (empty($xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:opa/text()'))) {
                    $opa[] = $DEFAULT_EMPTY_NUMBER;
                }
                else{
                    $opa_part = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:opa/text()');
                    $opa[] = $opa_part[0];
                }
            }
                
                
                //緯度と経度を足したもの(例:緯度 経度)
                $geometries = $xml->xpath('/ksj:Dataset/gml:Point/gml:pos/text()');
                
                
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
        
                    for($k = $loop * 5000; $k < $array_count; $k++){
                        $list[] = [
                            'adm'=>$adm[$k],
                            'lgn'=>$lgn[$k],
                            'nop'=>$nop[$k],
                            'kdp'=>$kdp[$k],
                            'pop'=>$pop[$k],
                            'cop'=>$cop[$k],
                            'timePosition'=>$timePosition[$k],
                            'opa'=>$opa[$k],
                            'latitude'=>$latitude_array[$k],
                            'longitude'=>$longitude_array[$k],
                        ];
                    } 
                }
                DB::table('parks')->insert(
                    $list
                );
        }



        
        
    
        
        // \Log::debug($path);
    }
}
