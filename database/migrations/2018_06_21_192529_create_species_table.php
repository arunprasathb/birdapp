<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('speciesName');
            // $table->text('shortDescription');
            $table->text('description');
            $table->string('imageUrl');
            $table->string('map');
            $table->string('residency')->nullable();
            $table->string('endemism')->nullable();
            $table->string('risk_level')->nullable();
            $table->string('habitat')->nullable();
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('species');
    }
}
