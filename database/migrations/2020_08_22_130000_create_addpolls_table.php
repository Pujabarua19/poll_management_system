<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddpollsTable extends Migration
{
    /**
     * Run the migrations.

     *
     * @return void
     */
    public function up()
    {
        Schema::create('addpolls', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            
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
            $table->timestamps();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addpolls');
    }
}
