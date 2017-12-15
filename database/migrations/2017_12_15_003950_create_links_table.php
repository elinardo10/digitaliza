<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('pasta_id')->unsigned();
            $table->foreign('pasta_id')->references('id')->on('pastas')
                  ->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('subpasta_id')->unsigned();
            $table->foreign('subpasta_id')->references('id')->on('sub_pastas')
                  ->onDelete('CASCADE')->onUpdate('CASCADE');
                  
            $table->string('nome');
            $table->string('link');
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
        Schema::dropIfExists('links');
    }
}
