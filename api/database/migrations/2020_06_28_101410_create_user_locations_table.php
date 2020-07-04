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
            $table->unsignedTinyInteger('number_of_people');//人数
            $table->integer('time_diff');//滞在時間
            $table->timestamp('start_time'); //開始時間 時間関連の型はtimestampを使う
            $table->timestamp('end_time'); //終了時間         
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
