<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Players;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Validator;

class PlayersController extends Controller
{

    protected $guarded = ['id', 'account_id'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $data['searchPlayerInfo']=Players::searchPlayerInfo($request->search);
        $data['getAllInfo']=Players::getAllInfo();
        return view('Backend.players',$data);
    }

    public function addPlayer(Request $request)
    {
        $validatedData = $request->validate([  
            'account' => ['required', 'string', 'max:255',"unique:accountPlayer"],
            'name' => ['required', 'string', 'max:255',"unique:accountPlayer"],
            'password' => ['required', 'string', 'min:6'], 
            'currency' => ['required', 'string'],
            'status' => ['required', 'string', 'min:1', 'min:1'],
        ]);
        $Players = new Players;
        $Players->account   = $request->account;
        $Players->name      = $request->name;
        $Players->password  = $request->password;
        $Players->currency  = $request->currency;
        $Players->status    = $request->status;
        $Players->save();
        return $this->index($request);
    }

    public function searchPlayer(Request $request)
    {
        $data['getPlayerInfoById']=Players::getPlayerInfoById($request->playerId);
        $data['getPlayerInfoByAccount']=Players::getPlayerInfoByAccount($request->account);
        $data['getPlayerInfoByName']=Players::getPlayerInfoByName($request->name);
        $data['getPlayerInfoByCurrency']=Players::getPlayerInfoByCurrency($request->currency);
        return   $this->index($data);
    }

    public function editPlayer(Request $request)
    {
        // 驗證請求...
       
        $Players = Players::getPlayerInfoById($request->playerId);

        $Players->account   = $request->account;
        $Players->name      = $request->name;
        $Players->password  = $request->password;
        $Players->currency  = $request->currency;
        $Players->status    = $request->status;
        $Players->save();
    }

}
