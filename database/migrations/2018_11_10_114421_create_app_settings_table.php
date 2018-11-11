<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('booklist_bg_option')->default("color");
            $table->string('booklist_bg_color')->nullable();
            $table->string('booklist_bg_image')->nullable();
            $table->string('specieslist_bg_option')->default("color");
            $table->string('specieslist_bg_color')->nullable();
            $table->string('specieslist_bg_image')->nullable();
            $table->string('voicelist_bg_option')->default("color");
            $table->string('voicelist_bg_color')->nullable();
            $table->string('voicelist_bg_image')->nullable();
            $table->string('pageA_bg_option')->default("color");
            $table->string('pageA_bg_color')->nullable();
            $table->string('pageA_bg_image')->nullable();
            $table->string('pageB_bg_option')->default("color");
            $table->string('pageB_bg_color')->nullable();
            $table->string('pageB_bg_image')->nullable();
            $table->string('pageC_bg_option')->default("color");
            $table->string('pageC_bg_color')->nullable();
            $table->string('pageC_bg_image')->nullable();
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
        Schema::dropIfExists('app_settings');
    }
}
