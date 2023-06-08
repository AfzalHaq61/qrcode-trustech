<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id')->uniqid();
            $table->string('qr_code_id');
            $table->string('iso_code');
            $table->string('country_code');
            $table->string('os_name');
            $table->string('city_name');
            $table->string('referrer_host');
            $table->string('referrer_path');
            $table->string('device_type');
            $table->string('browser_name');
            $table->string('browser_language');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics');
    }
}
