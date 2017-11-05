<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            
            $table->integer('opening_id')->unsigned();
            $table->foreign('opening_id')
                  ->references('id')
                  ->on('openings')
                  ->onDelete('cascade');

            $table->integer('queue')->unsigned();

            $table->integer('min_rate');
            $table->integer('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tests');
    }
}
