<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[

            
        'user_id'=>1,
        'park_id'=>1,
        'latitude'=>22.2,
        'longitude'=>22.2,
        'number_of_people'=>2,
        'time_diff'=>60,
        'start_time'=>'2020-08-20 15:14:37',
        'end_time'=>'2020-08-20 16:14:37',
        'created_at'=>'2020-06-20 16:14:37',
        'updated_at'=>'2020-06-20 16:14:37',
        ];
        DB::table('user_locations')->insert($param);
    }
}
