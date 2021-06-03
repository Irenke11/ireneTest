<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;
    protected $table = 'gameList';
    protected $primaryKey = 'codeName';

    public static function getAllInfo(){
        $Games = Games::all();
        return $Games;
    }

    public static function searchGameInfo($search){
        $GamesearchInfo = Games::where('gameType', 'like', '%'.$search.'%')
                                ->orwhere('gameName', 'like', '%'.$search.'%')
                                ->orwhere('codeName', 'like', '%'.$search.'%')
                                ->distinct()
                                ->get();
        return $GamesearchInfo;
    }

    public static function getGameInfoById($codeName){
        $GamesInfo = Games::where('codeName', '=', $codeName)->first();
        return $GamesInfo;
    }
}
