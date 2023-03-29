<?php

namespace App\Classes;

use App\Interfaces\GameInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class Game implements GameInterface
{
    public function createGame($nameOfGameModel)
    {
        $newGame = new $nameOfGameModel;
        return $newGame->id();
    }
    public function deleteGame($nameOfGameModel, int $gameId)
    {
        $nameOfGameModel::find($gameId)->forceDelete();
    }
    public function connectToGame($nameOfGameModel, int $gameId, int $playerId)
    {
        $game = $nameOfGameModel::where('id', $gameId)->first();
        if ($game->player_1 == null) {
            $game->player_1 = $playerId;
            $game->save();
        } elseif ($game->player_1 != $playerId && $game->player_2 == null) {
            $game->player_2 = $playerId;
            $game->save();
        }
        redirect(route("/game/$nameOfGameModel/$gameId"));
    }
    public function fastConnectToGame($nameOfGameModel, int $playerId)
    {
        $game = $na;
    }
}
