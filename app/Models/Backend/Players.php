<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;
    // 玩家維護功能
    // （新增、查詢，
    // 玩家帳號、名稱、幣別）
    protected $table = 'accountPlayer';
    protected $primaryKey = 'playerId';
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    //     'remember_token',
    //     'email_verified_at',
    //     'country_id',
    //     'state_id',
    //     'city_id',
    //     'city_name',
    // ];
    public static function getAllInfo(){
        $Players = Players::all();
        return $Players;
    }

    public static function searchPlayerInfo($search){

        if(isset($search)){
            foreach($search as $name => $value){
                if(isset($value)){
                    $PlayersearchInfo = Players::where($name, 'like', '%'.$value.'%')
                    ->distinct()
                    ->get();  
                }
            }
        }else{
        $PlayersearchInfo = Players::where('name', 'like', '%'.$search['name'].'%')
                                ->orwhere('playerId', 'like', '%'.$search['playerId'].'%')
                                ->orwhere('account', 'like', '%'.$search['account'].'%')
                                ->distinct()
                                ->get();
        }
        return $PlayersearchInfo;
    }

    public static function getPlayerInfoById($playerId){
        $PlayerInfo = Players::where('playerId', '=', $playerId)->first();
        return $PlayerInfo;
    }

    public static function getPlayerInfoByAccount($account){
        $PlayerInfo = Players::where('account', '=', $account)->get();
        return $PlayerInfo;
    }

    public static function getPlayerInfoByName($name){
        $PlayerInfo = Players::where('name', '=', $name)->get();
        return $PlayerInfo;
    }
    
    public static function getPlayerInfoByCurrency($currency){
        $PlayerInfo = Players::where('currency', '=', $currency)->get();
        return $PlayerInfo;
    }

}
