<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyBetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyBet', function (Blueprint $table) {
            $table->increments("id")->from(4001)->unique();
            $table->string('gameType', 32);
            $table->TIMESTAMP('betsDay');
            $table->string('count', 12);
            $table->decimal('allAmount',24, 6)->unsigned();
            $table->decimal('allPayout',24, 6)->unsigned();
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
        Schema::dropIfExists('dailyBet');
    }
}
