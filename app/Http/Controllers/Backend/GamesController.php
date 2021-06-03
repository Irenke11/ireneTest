<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Validator;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=[];
        $data['gameTypeList'] = config('setting.gametype');
        $data['searchGameInfo'] = Games::searchGameInfo($request->search);
        $data['getAllInfo'] = Games::getAllInfo();

        return view('Backend.games',$data);
    }

    public function addGame(Request $request)
    {
        $validatedData = $request->validate([  
            'gameType' => ['required', 'string', 'max:255'],
            'gameName' => ['required', 'max:255'],
            'status' => ['required', 'string', 'min:1', 'min:1'],
        ]);
        $Games = new Games;
        $Games->gameType  = $request->gameType;
        $Games->gameName  = json_encode($request->gameName, true);
        $Games->status    = $request->status;
        $Games->save();
        return $this->index($request);
    }

    public function editGame(Request $request)
    {
        $validatedData = $request->validate([  
            'codeName' => ['required', 'string', 'max:255'],
            'gameType' => ['required', 'string', 'max:255'],
            'gameName' => ['required', 'max:255'],
            'status' => ['required', 'string', 'min:1', 'min:1'],
        ]);
        $Games = Games::getGameInfoById($request->codeName);
        $Games->gameType  = $request->gameType;
        $Games->gameName  = json_encode($request->gameName, true);
        $Games->status    = $request->status;
        $Games->save();
        return $this->index($request);
    }
}
