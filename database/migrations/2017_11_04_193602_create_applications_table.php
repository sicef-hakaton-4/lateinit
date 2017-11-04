<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            

            $table->integer('opening_id')->unsigned();
            $table->foreign('opening_id')
                  ->references('id')
                  ->on('openings')
                  ->onDelete('cascade');

            $table->integer('expert_id')
                  ->references('id')
                  ->on('experts')
                  ->onDelete('cascade');

            $table->timestamp('applied_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
