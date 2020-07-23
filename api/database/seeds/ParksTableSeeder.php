<?php

use Illuminate\Database\Seeder;

class ParksTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $DEFAULT_EMPTY_STR = "empty";
        $DEFAULT_EMPTY_NUMBER = 0;

        for($prefecture_arr_num = 0; $prefecture_arr_num < 47; $prefecture_arr_num++){
            $prefecture_num = $prefecture_arr_num + 1;

            $fp = \File::get(storage_path($this->get_cachefile_path($prefecture_num)));
            $list = json_decode($fp, true);

            $parks = [];
            foreach ($list as $obj) {
                $parks[] = [
                    'adm' => $obj['adm'][0] ?? $DEFAULT_EMPTY_STR,
                    'lgn' => $obj['lgn'][0] ?? $DEFAULT_EMPTY_STR,
                    'nop' => $obj['nop'][0] ?? $DEFAULT_EMPTY_STR,
                    'kdp' => $obj['kdp'][0] ?? $DEFAULT_EMPTY_STR,
                    'pop' => $obj['pop'][0] ?? $DEFAULT_EMPTY_STR,
                    'cop' => $obj['cop'][0] ?? $DEFAULT_EMPTY_STR,
                    'opa' => $obj['opa'][0] ?? $DEFAULT_EMPTY_NUMBER,
                    'timePosition' => $obj['timePosition'],
                    'latitude' => $obj['latitude'],
                    'longitude' => $obj['longitude'],
                ];
            }

            \Log::debug($prefecture_num.'件目 start');
            DB::table('parks')->insert($parks);
            \Log::debug($prefecture_num.'件 end');
        }
    }

    public function get_cachefile_path($prefecture_num) {
        $display_num_str = $prefecture_num < 10 ? "0{$prefecture_num}" : (string)$prefecture_num;

        return "park_data/json/P13-11_{$display_num_str}.json";
    }
}
