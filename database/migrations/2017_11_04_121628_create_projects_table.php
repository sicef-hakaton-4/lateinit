<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            
            $table->increments('id');
            

            $table->integer('owner_id');
            $table->tinyInteger('owner'); //0 za strucnjaka 1 za firmu

            $table->string('name');
            $table->string('description');
            $table->string('client')->nullable();

            $table->string('technologies'); // CSV
            $table->string('position')->nullable();

            $table->datetime('started');
            $table->datetime('ended');
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
        Schema::dropIfExists('projects');
    }
}
