<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Backend\Bets as betsModels;
use DB;

class bets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:bets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command bets';

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
        $Bets=new Bets;
        $Bets->gameId    = "2001";
        $Bets->playerId  = "1001";
        $Bets->amount    = "10";
        $Bets->payout    = "5";
        $Bets->bureauNo  = "5010";
        $Bets->betTime   = date('Y-m-d H:i:s');
        $Bets->save();
    }

    // public function createBets(){
    //     $Bets=new Bets;
    //     $Bets->gameId    = "2002";
    //     $Bets->playerId  = "1002";
    //     $Bets->amount    = "10";
    //     $Bets->payout    = "5";
    //     $Bets->bureauNo  = "5011";
    //     $Bets->betTime   = date('Y-m-d H:i:s');
    //     $Bets->save();
    // }
    
}
