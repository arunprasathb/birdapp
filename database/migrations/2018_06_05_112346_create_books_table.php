<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('bookName');
            $table->integer('price');
            $table->text('shortDescription');
            $table->text('description');
            $table->string('imageUrl');
            $table->string('paidPdfUrl');
            $table->string('unpaidPdfUrl');
            $table->string('map');
            $table->string('author');
            $table->boolean('status')->default(1)->comment('1->Active, 0->Inactive');
//            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
//            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
		$table->timestamps();
            $table->softDeletes();
        });
         /*Schema::table('books', function($table) {
            $table->foreign('user_id')->references('id')->on('user');
          });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
