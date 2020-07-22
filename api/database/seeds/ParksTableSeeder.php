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
        for($prefecture_arr_num = 0; $prefecture_arr_num < 47; $prefecture_arr_num++){
            $prefecture_num = $prefecture_arr_num + 1;

            $fp = File::get(storage_path($this->get_cachefile_path($prefecture_num)));
            $list = json_decode($fp);

            \Log::debug($prefecture_num.'件目 start');
            DB::table('parks')->insert($list);
            \Log::debug($prefecture_num.'件 end');
        }
    }

    public function get_cachefile_path($prefecture_num) {
        $display_num_str = $prefecture_num < 10 ? "0{$prefecture_num}" : (string)$prefecture_num;

        return "park_data/json/P13-11_{$display_num_str}.json";
    }
}
