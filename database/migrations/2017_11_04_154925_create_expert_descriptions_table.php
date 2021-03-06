<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_descriptions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            
            $table->integer('expert_id')->unsigned();
            $table->foreign('expert_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->string('technologies'); // CSV
            $table->string('position');

            $table->string('address')->nullable();
            $table->string('phonenumber')->nullable();

            $table->tinyInteger('public')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('expert_descriptions');
    }
}
