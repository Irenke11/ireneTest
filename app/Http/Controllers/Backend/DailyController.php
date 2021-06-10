<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Daily;
use App\Models\Backend\Bets;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index(Request $request)
    {
  
        $data['searchDailyInfo'] = Daily::searchDailyInfo($request->search);
        // $data['test']=Daily::dailySettlement($request->day);
        return view('Backend.Daily',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function addDaily(Request $request){
        
        $day = isset($request->betsDay)? Carbon::parse($request->betsDay)->toDateTimeString():Carbon::today()->subday()->toDateTimeString();//昨天
 
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
        $data['searchDailyInfo'] = Daily::searchDailyInfo($request->search);
        return view('Backend.Daily',$data);
    }
}
