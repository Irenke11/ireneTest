<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PlayersController;
// use App\Http\Controllers\Backend\GamesController;
// use App\Http\Controllers\Backend\BetsController;
// use App\Http\Controllers\Backend\DailyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/GET/players', [App\Http\Controllers\Backend\PlayersController::class, 'index'])->name('players'); //页面显示+查询
    Route::post('/POST/addPlayer', [App\Http\Controllers\Backend\PlayersController::class, 'addPlayer'])->name('addPlayer'); //新增
    Route::post('/POST/searchPlayers', [App\Http\Controllers\Backend\PlayersController::class, 'index'])->name('searchPlayers'); //查询
    // Route::post('/POST/editPlayers', [App\Http\Controllers\Backend\PlayersController::class, 'edit'])->name('editPlayers'); //编辑+删除/开启
Route::get('/GET/games', [App\Http\Controllers\Backend\GamesController::class, 'index'])->name('games');//页面显示+查询
    Route::post('/POST/addGame', [App\Http\Controllers\Backend\GamesController::class, 'addGame'])->name('addGame'); //新增
    Route::post('/POST/searchGames', [App\Http\Controllers\Backend\GamesController::class, 'index'])->name('searchGames'); //查询
    Route::post('/POST/editGames', [App\Http\Controllers\Backend\GamesController::class, 'editGame'])->name('editGame');//编辑+删除
    // Route::post('/POST/editGames/{codeName}', [App\Http\Controllers\Backend\GamesController::class, 'editGame'])->name('editGame');//编辑+删除
Route::get('/GET/bets', [App\Http\Controllers\Backend\BetsController::class, 'index'])->name('bets');//页面显示+查询
    Route::post('/POST/addBet', [App\Http\Controllers\Backend\BetsController::class, 'addBet'])->name('addBet');//新增
    Route::post('/POST/searchBets', [App\Http\Controllers\Backend\BetsController::class, 'index'])->name('searchBets'); //查询
    // Route::get('/GET/bets/{time}/{bureauNo}', [App\Http\Controllers\Backend\BetsController::class, 'index'])->name('bets');//页面显示+查询
Route::get('/GET/daily', [App\Http\Controllers\Backend\DailyController::class, 'index'])->name('daily');//页面显示+查询
    // Route::post('/POST/daily', [App\Http\Controllers\Backend\DailyController::class, 'addDaily'])->name('daily');//結算(排程)
    // Route::get('/GET/daily/{day}', [App\Http\Controllers\Backend\DailyController::class, 'index'])->name('daily');//页面显示+查询
    Route::post('/POST/addDaily', [App\Http\Controllers\Backend\DailyController::class, 'addDaily'])->name('addDaily');
    Route::post('/POST/searchDaily', [App\Http\Controllers\Backend\DailyController::class, 'index'])->name('searchDaily');

  

// Route::get('/users', 'App\Http\Controllers\UserController@index');
// Route::get('/GET/games', ['GamesController::class','index']);//页面显示+查询
// Route::get('/', [RegistrationController::class, 'create']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
