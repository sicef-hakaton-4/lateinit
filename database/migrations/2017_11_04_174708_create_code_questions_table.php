<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_questions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            
            $table->integer('test_id')->unsigned();
            $table->foreign('test_id')
                  ->references('id')
                  ->on('tests')
                  ->onDelete('cascade');

            $table->string('task');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('code_questions');
    }
}
