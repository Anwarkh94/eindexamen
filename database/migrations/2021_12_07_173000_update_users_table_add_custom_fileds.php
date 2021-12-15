<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddCustomFileds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender', 20)->nullable()->comment('Male | Female');
            $table->string('avatar', 255)->nullable();
            $table->timestamp('last_login')->nullable();
            $table->decimal('allowed_per_day', 16, 2)->default('60');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'gender',
                'avatar',
                'last_login',
                'allowed_per_day',
            ]);
        });
    }
}
