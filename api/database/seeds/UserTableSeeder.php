<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'name'=>'aaa',
            'email'=>'obatanaohumi@gmail.com',
            'password'=>'aaaa11aa',
            'email_verified_at'=>'2020-06-20 15:14:01',
            'remember_token'=>'3eb6f6bd-5998-406c-a2a6-5f1af51e09bf',
            'created_at'=>'2020-04-20 15:14:01',
            'updated_at'=>'2020-04-20 15:14:01',

        ];
        DB::table('users')->insert($param);
    }
}
