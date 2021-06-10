<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Backend\Bets;
use App\Models\Backend\Daily;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('bets', function () {
     //之後記得改成call contrller
    $Bets=new Bets;
    $Bets->gameId    = "3001";
    $Bets->playerId  = "1001";
    $Bets->amount    = "10";
    $Bets->payout    = "5";
    $Bets->bureauNo  = "5012";
    $Bets->betTime   = date('Y-m-d H:i:s');
    $Bets->save();
});
Artisan::command('dailySettlement', function () {
    //之後記得改成call contrller
    $day = Carbon::today()->subday()->toDateTimeString();//昨天
    $dayTime['startTime'] = Carbon::parse($day)->toDateTimeString();            //00:00:00
    $dayTime['endTime'] = Carbon::parse($day)->endOfday()->toDateTimeString();  //23:59:59
    $data['gameTypeList'] = config('setting.gametype');//遊戲類型列表
    foreach ($data['gameTypeList'] as $gameType ){
        $countSchedule = Daily::checkSchedule($dayTime,$gameType); //是否已存在
        if($countSchedule == 0 ){
            $dailyBets = Bets::dailyBets($dayTime,$gameType);
            $dailyBets['betsDay']=Carbon::parse($day)->toDateString();
            $dailyBets['gameType']=$gameType;
            $Schedule = Daily::addSchedule($dailyBets);
        }
    }
});