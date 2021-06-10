<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Backend\Bets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data=[];
        // $data['gameTypeList'] = config('setting.gametype');
        $data['searchBetsInfo'] = Bets::searchBetsInfo($request->search);
        // $data['getAllInfo'] = Bets::getAllInfo();

        return view('Backend.bets',$data);
    }

    public function addBet(Request $request)
    {
        $validatedData = $request->validate([  
            'gameId' => ['required', 'exists:gameList,codeName','string', 'max:255'],
            'playerId' => ['required', 'exists:accountPlayer,playerId','string', 'max:255'],
            'amount' => ['required','string', 'max:255'],
            'payout' => ['required','string', 'max:255'],
            'bureauNo' => ['required','string', 'max:255'],
            'betTime' => ['required','string', 'max:255'],
        ]);
        $Bets = new Bets;
        $Bets->gameId    = $request->gameId;
        $Bets->playerId  = $request->playerId;
        $Bets->amount    = $request->amount;
        $Bets->payout    = $request->payout;
        $Bets->bureauNo  = $request->bureauNo;
        $Bets->betTime   = $request->betTime;
        $Bets->save();

        return $this->index($request);
    }
}
