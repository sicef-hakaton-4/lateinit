<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyDescriptionMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_descriptions', function (Blueprint $t) {
            $t->increments('id')->unsigned();

            $t->integer('company_id')->unsigned();
            $t->foreign('company_id')
              ->references('id')
              ->on('users');

            $t->string('description', 500);
            $t->integer('founded')->unsigned();
            $t->integer('employees')->unsigned();
            $t->string('headquarters');
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
        Schema::dropIfExists('company_descriptions');
    }
}
