<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
                    
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned()->index();
            $table->foreign('user_id')
                  ->references('id')->on('registers')
                  ->onDelete('cascade');
            $table->text('poll_title');
            $table->string('option_num');
            $table->string('option_type');
           
            $table->string('options')->nullable();
            $table->biginteger('package_id')->unsigned()->index();
            $table->foreign('package_id')
                  ->references('id')->on('packages')
                  ->onDelete('cascade');
           
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            // $table->script('payment_status');
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
        Schema::dropIfExists('polls');
    }
}
