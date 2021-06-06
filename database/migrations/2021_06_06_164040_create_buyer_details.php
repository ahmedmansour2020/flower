<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('buyer_name')->nullable();
            $table->string('buyer_mobile')->nullable();
            $table->string('buyer_logo')->nullable();
            $table->string('buyer_banner')->nullable();
            $table->string('buyer_site')->nullable();
            $table->string('buyer_whatsapp')->nullable();
            $table->string('buyer_snapshat')->nullable();
            $table->string('buyer_instagram')->nullable();
            $table->string('buyer_twitter')->nullable();
            $table->string('buyer_facebook')->nullable();
            $table->string('buyer_tiktok')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {});
    }
}
