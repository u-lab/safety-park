<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parks', function (Blueprint $table)
        {
            $table->id();
            $table->string('adm')->comment('管轄団体名（都道府県・地方整備局）');
            $table->string('lgn')->comment('管理団体名（市区町村)');
            $table->string('nop')->nullable()->comment('都市公園の名称');
            $table->string('kdp')->nullable()->comment('公園種別コード');
            $table->string('pop')->nullable()->comment('都市公園の所在地名（都道府県）');
            $table->string('cop')->nullable()->comment('都市公園の所在地名（市区町村）');
            $table->unsignedSmallInteger('timePosition')->nullable()->comment('供用開始した年（西暦）');
            $table->unsignedInteger('opa')->nullable()->comment('供用開始最終開設面積（m2）');
            $table->double('latitude', 15, 12)->comment('緯度');
            $table->double('longitude', 15, 12)->comment('経度');
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
        Schema::dropIfExists('parks');
    }
}
