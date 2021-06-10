<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Bets extends Model
{
    use HasFactory;
    protected $table = 'bets';
    protected $primaryKey = 'betId';

    public static function getAllInfo(){
        $Bets = Bets::all();
        return $Bets;
    }

    public static function searchBetsInfo($search){
        if(isset($search["bureauNo"])){
            $BetsearchInfo = Bets::where('bureauNo', '=', $search["bureauNo"])->first();
        }elseif(isset($search["start"]) && isset($search["end"])){
            // $BetsearchInfo = Bets::where('betTime', 'between '.$search["start"].' and '.$search["end"])->get();  
            $BetsearchInfo = Bets::whereBetween('betTime', [$search["start"],$search["end"]])->get();
        }else{
            $BetsearchInfo = Bets::all();
        }
                     
        return $BetsearchInfo;
    }

    public static function searchBetsInfoById($search){

        $BetsearchInfo["betId"] = Bets::where('betId', 'like', '%'.$search.'%')
                                ->distinct()
                                ->first();                     
        return $BetsearchInfo;
    }

    public static function searchBetsInfoByTime($search){
        $BetsearchInfo["time"] = Bets::where('betTime', 'between '.$search["start"].' and '.$search["end"])->get();                       
        return $BetsearchInfo;
    }

    public static function checkBets($dayTime = null,$gameType =null){
        $Dailycount = Daily::whereBetween('betsTime', [$dayTime["startTime"],$dayTime["endTime"]])
        ->where('gameType', '=', $gameType)
        ->count();
        return $Dailycount;
    }

    public static function dailyBets($dayTime,$gameType){
        $dailyBets= Bets::select(
                        DB::raw('count(*) as count'),
                        DB::raw('SUM(amount) as allAmount'),
                        DB::raw('SUM(payout) as allPayout'),
                        // DB::raw('.'$dayTime["startTime"].' as betsDay'),
                        // DB::raw('slot as gameType'),
                    )
                    ->join('gameList', 'bets.gameId', '=', 'gameList.codeName')
                    ->whereBetween('betTime', [$dayTime["startTime"],$dayTime["endTime"]])
                    ->where('gameType',"=",$gameType)
                    ->first();
        
        // print("<pre>".print_r($dailyBets,true)."</pre>");
        return $dailyBets;
    }
}
