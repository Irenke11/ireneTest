<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountPlayer', function (Blueprint $table) {
            $table->increments('playerId')->from(1001)->unique();
            $table->string('account', 10)->unique();
            $table->string('password', 10);
            $table->string('name', 10)->unique();
            $table->string('currency');
            $table->string('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('accountPlayer');
    }
}
