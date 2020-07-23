<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class CreateParkCacheFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:parkcache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parkのxmlを一時ファイルに変換する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set("memory_limit", "500M");
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
            $park_path = storage_path($this->get_xmlfile_path($prefecture_num));
            $word = file_get_contents($park_path);
            $xml = simplexml_load_string($word, 'SimpleXMLElement', LIBXML_NOCDATA);

            $count_xmlpath = $xml->xpath('/ksj:Dataset/ksj:Park');
            for($i = 1; $i <= count($count_xmlpath); $i++){
                $adm[] = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:adm/text()')[0][0] ?? $DEFAULT_EMPTY_STR;
                $lgn[] = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:lgn/text()')[0][0] ?? $DEFAULT_EMPTY_STR;
                $nop[] = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:nop/text()')[0][0] ?? $DEFAULT_EMPTY_STR;
                $kdp[] = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:kdp/text()')[0][0] ?? $DEFAULT_EMPTY_STR;
                $pop[] = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:pop/text()')[0][0] ?? $DEFAULT_EMPTY_STR;
                $cop[] = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:cop/text()')[0][0] ?? $DEFAULT_EMPTY_STR;
                $timePosition[] = $xml->xpath('/ksj:Dataset[@gml:id="pk'.$i.'"]/ksj:Park/ksj:opd/gml:TimeInstant/gml:timePosition/text()')[0][0] ?? $DEFAULT_EMPTY_NUMBER;
                $opa[] = $xml->xpath('/ksj:Dataset/ksj:Park[@gml:id="pk'.$i.'"]/ksj:opa/text()')[0][0] ?? $DEFAULT_EMPTY_NUMBER;
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
                $add = $loop === $max_count-1 ? $max % 5000: 5000;
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

            \Log::debug($prefecture_num.'件目 start');
            File::put(storage_path($this->get_cachefile_path($prefecture_num)), json_encode($list, JSON_PRETTY_PRINT));
            \Log::debug($prefecture_num.'件 end');
        }
    }

    /**
     * xmlファイルのパスを取得
     *
     * @param string $prefecture_num
     * @return void
     */
    public function get_xmlfile_path($prefecture_num) {
        $display_num_str = $prefecture_num < 10 ? "0{$prefecture_num}" : (string)$prefecture_num;

        return "park_data/P13-11_{$display_num_str}_GML/P13-11_{$display_num_str}.xml";
    }

    public function get_cachefile_path($prefecture_num) {
        $display_num_str = $prefecture_num < 10 ? "0{$prefecture_num}" : (string)$prefecture_num;

        return "park_data/json/P13-11_{$display_num_str}.json";
    }
}
