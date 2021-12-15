<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Spellendev extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spellendev', function (Blueprint $table) {

        $table->bigIncrements('id');
        $table->string('naam');
        $table->integer('categroieen_id')->unsigned();
        $table->integer('leeftijd')->unsigned();
        $table->string('beschrijving')->nullable();
        $table->string('foto')->nullable();
        $table->text('iframe')->nullable();
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
        Schema::dropIfExists('spellendev');
    }
}
