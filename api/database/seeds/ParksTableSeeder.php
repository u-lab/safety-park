<?php

use Illuminate\Database\Seeder;

class ParksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            //'id'=>'1',
            'created_at'=>'2020-05-20 15:14:37',
            'updated_at'=>'2020-05-20 15:14:37',
        ];
        DB::table('parks')->insert($param);
        $param=[
            'created_at'=>'2020-06-20 15:14:37',
            'updated_at'=>'2020-06-20 15:14:37',
        ];
        DB::table('parks')->insert($param);
    }
}
