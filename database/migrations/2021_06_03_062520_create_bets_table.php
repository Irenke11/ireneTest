<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->increments('betId')->from(3001)->unique();//注單編號
            $table->string('gameId', 10);//遊戲名稱
            $table->string('playerId', 10);//會員帳號 幣別
            $table->decimal('amount',24, 6)->unsigned();//投注額
            $table->decimal('payout',24, 6)->unsigned();//派彩
            $table->string('bureauNo', 10); //局號
            $table->dateTime('betTime')->default(DB::raw('CURRENT_TIMESTAMP'));//下注時間
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
        Schema::dropIfExists('bets');
    }
}
