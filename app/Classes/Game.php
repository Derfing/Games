<?php

namespace App\Classes;

use App\Interfaces\GameInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class Game implements GameInterface
{
    static function createGame($nameOfGameModel)
    {
        $newGame = new $nameOfGameModel;
        return $newGame->id();
    }
    static function deleteGame($nameOfGameModel, int $gameId)
    {
        $nameOfGameModel::find($gameId)->forceDelete();
    }
    static function connectToGame($nameOfGameModel, int $gameId, int $playerId)
    {
        $game = $nameOfGameModel::where('id', $gameId)->first();
        if ($game->player_1 == null) {
            $game->player_1 = $playerId;
            $game->save();
        } elseif ($game->player_1 != $playerId && $game->player_2 == null) {
            $game->player_2 = $playerId;
            $game->save();
        }
        redirect("/game/$nameOfGameModel/$gameId");
    }
    static function fastConnectToGame($nameOfGameModel, int $playerId)
    {
        $game = $nameOfGameModel::where('player_2', null)->first();
        $gameId = $game->id();
        if ($game->player_1 != $playerId) {
            $game->player_2 = $playerId;
            $game->save();
        }
        redirect("/game/$nameOfGameModel/$gameId");
    }
}
