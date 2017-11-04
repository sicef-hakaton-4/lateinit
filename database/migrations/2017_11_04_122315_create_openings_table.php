<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                  ->references('id')
                  ->on('users');

            $table->string('position');
            $table->string('description', 500);
            $table->string('requirements')->nullable();
            $table->enum('level', ['student', 'entry', 'mid-level', 'senior']);
            $table->date('deadline');

            $table->float('minimal_rate', 12, 2)->nullable();

            $table->string('technologies');
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
        Schema::dropIfExists('openings');
    }
}
