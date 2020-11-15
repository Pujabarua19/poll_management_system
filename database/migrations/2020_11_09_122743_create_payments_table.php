<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned()->index();
            $table->foreign('user_id')
                  ->references('id')->on('registers')
                  ->onDelete('cascade');
            $table->biginteger('poll_id')->unsigned()->index();
            $table->foreign('poll_id')
                  ->references('id')->on('polls')
                  ->onDelete('cascade');
            $table->text('card_name');
            $table->string('card_num');
            $table->string('cvc');
            $table->string('month');
            $table->string('year');
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
        Schema::dropIfExists('payments');
    }
}
