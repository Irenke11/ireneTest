<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Backend\Daily;
use App\Models\Backend\Bets;
use Carbon\Carbon;

class dailySettlement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:dailySettlement';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command dailySettlement';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
     
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      
        // $day = Carbon::today()->subday()->toDateTimeString();//昨天
        // $dayTime['startTime'] = Carbon::parse($day)->toDateTimeString();            //00:00:00
        // $dayTime['endTime'] = Carbon::parse($day)->endOfday()->toDateTimeString();  //23:59:59
        // $data['gameTypeList'] = config('setting.gametype');//遊戲類型列表
        // foreach ($data['gameTypeList'] as $gameType ){
        //     $countSchedule = Daily::checkSchedule($dayTime,$gameType); //是否已存在
        //     if($countSchedule == 0 ){
        //         $dailyBets = Bets::dailyBets($dayTime,$gameType);
        //         $dailyBets['betsDay']=Carbon::parse($day)->toDateString();
        //         $dailyBets['gameType']=$gameType;
        //         $Schedule = Daily::addSchedule($dailyBets);
        //     }
        // }
    }

}
