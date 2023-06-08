<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('show_qr')->default(1)->nullable();
            $table->bigInteger('qr_count')->nullable();
            $table->text('accessable_qr')->nullable();
            $table->longText('google_analytics_id')->nullable();
            $table->longText('google_adsense')->nullable();
            $table->longText('facebook_pixel')->nullable();
            $table->longText('site_name')->nullable();
            $table->longText('site_logo')->nullable();
            $table->longText('favicon')->nullable();
            $table->longText('seo_meta_description')->nullable();
            $table->longText('seo_keywords')->nullable();
            $table->longText('seo_image')->nullable();
            $table->longText('tawk_chat_bot_key')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('settings');
    }
}
