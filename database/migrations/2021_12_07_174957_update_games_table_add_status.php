<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGamesTableAddStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('spellendev', function (Blueprint $table) {
            $table->string('status')->default('Active')->comment('Active | Disabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('spellendev', function (Blueprint $table) {
            $table->dropColumn([
                'status'
            ]);
        });
    }
}
