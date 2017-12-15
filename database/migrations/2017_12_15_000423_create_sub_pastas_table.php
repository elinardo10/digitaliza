<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubPastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_pastas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasta_id')->unsigned();
            $table->foreign('pasta_id')->references('id')->on('pastas')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('nome');
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
        Schema::dropIfExists('sub_pastas');
    }
}
