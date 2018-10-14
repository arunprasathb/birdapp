<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_payments', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('bookId');
            $table->integer('user_id');
            $table->string('transaction_id');
            $table->string('download_count');
            $table->integer('amount');
            $table->boolean('payment_status')->default(0)->comment('1->Paid, 0->Unpaid');
//            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
//            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_payments');
    }
}
