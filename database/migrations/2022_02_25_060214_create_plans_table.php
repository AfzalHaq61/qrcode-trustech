<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id')->uniqid();
            $table->string('plan_name');
            $table->longText('plan_description')->nullable();
            $table->integer('plan_price');
            $table->integer('validity');
            $table->integer('no_access_qr');
            $table->integer('no_qrcodes');
            $table->integer('no_barcodes');
            $table->integer('access_text');
            $table->integer('access_url');
            $table->integer('access_phone');
            $table->integer('access_sms');
            $table->integer('access_email');
            $table->integer('access_whatsapp');
            $table->integer('access_facetime');
            $table->integer('access_location');
            $table->integer('access_wifi');
            $table->integer('access_event');
            $table->integer('access_crypto');
            $table->integer('access_vcard');
            $table->integer('access_paypal');
            $table->integer('access_upi');
            $table->integer('additional_tools');
            $table->integer('enable_analaytics');
            $table->integer('hide_branding');
            $table->integer('recommended')->nullable();
            $table->integer('is_watermark_enabled');
            $table->integer('free_setup')->nullable();
            $table->integer('support');
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
        Schema::dropIfExists('plans');
    }
}
