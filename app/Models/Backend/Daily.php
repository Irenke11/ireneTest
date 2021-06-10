<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Daily extends Model
{
    use HasFactory;
    protected $table = 'dailyBet';
    protected $primaryKey = 'betId';

    public static function searchDailyInfo($search=null){
        if(isset($search)){
            $DailyearchInfo = Daily::where('betsDay', 'like',"%".$search."%")->get();  
        }else{
            $DailyearchInfo = Daily::limit(1000)->orderBy('betsDay', 'DESC')->get();
        }        
        return $DailyearchInfo;
    }

    public static function checkSchedule($dayTime = null,$gameType =null){
        $Dailcount = Daily::whereBetween('betsDay', [$dayTime["startTime"],$dayTime["endTime"]])
        ->where('gameType', '=', $gameType)
        ->count();
        return $Dailcount;
    }

    public static function addSchedule($request){
        //  print("<pre>".print_r($request,true)."</pre>");
        $Schedule = new Daily;
        $Schedule->gameType  = $request->gameType;
        $Schedule->betsDay   = $request->betsDay;
        $Schedule->count     = $request->count ?? 0;
        $Schedule->allAmount = $request->allAmount ?? 0;
        $Schedule->allPayout = $request->allPayout ?? 0;
        $Schedule->save();
        // print("<pre>".print_r($Schedule,true)."</pre>");
    }
    public static function updateSchedule($day = null,$game = null){
        $Schedule = Daily::where('betsDay',"=",$day)->and("gameType","=",$game)->get();
        $Schedule->gameType  = $request->gameType;
        $Schedule->betsDay   = $request->betsDay;
        $Schedule->count     = $request->count ?? 0;
        $Schedule->allAmount = $request->allAmount ?? 0;
        $Schedule->allPayout = $request->allPayout ?? 0;
        $Schedule->save();
    }
}
