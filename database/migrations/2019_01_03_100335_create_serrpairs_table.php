<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerrpairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serrpairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device_id');//报修设备ID
            $table->string('device_name');//报修设备名字
            $table->string('bewrite');//报修描述
            $table->string('server_image')-nullable();//报修上传图片
            $table->string('contact')->nullable();//联系人姓名
            $table->string('contact_phone')->nullable();//联系人手机号
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
        Schema::dropIfExists('serrpairs');
    }
}
