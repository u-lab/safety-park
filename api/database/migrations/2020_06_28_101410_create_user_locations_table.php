<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');          // ユーザID
            $table->unsignedBigInteger('park_id');          // パークID
            $table->double('latitude', 15, 12);  // 緯度
            $table->double('longitude', 15, 12); // 経度
            $table->unsignedTinyInteger('number_of_people');//人数 256人まで
            $table->integer('time_diff');//滞在時間
            $table->dateTime('start_time',0); //開始時間 
            $table->dateTime('end_time',0); //終了時間 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_locations');
    }
}
