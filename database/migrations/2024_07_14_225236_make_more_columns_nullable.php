<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeMoreColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            $table->string('user_type')->nullable()->change();
            $table->unsignedBigInteger('restaurant_id')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->string('password_confirmation')->nullable()->change();
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
            $table->string('phone')->nullable(false)->change();
            $table->string('user_type')->default("Customer")->nullable(false)->change();
            $table->unsignedBigInteger('restaurant_id')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
            $table->string('password')->nullable(false)->change();
            $table->string('password_confirmation')->nullable(false)->change();
        });
    }
}
