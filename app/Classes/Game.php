<?php

namespace App\Classes;

use App\Interfaces\GameInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class Game implements GameInterface
{
    protected $gameModel;
    protected array $players;
    public $game;

    public function createGame(int $playerId)
    {
        $this->game = new $this->gameModel;
        $this->game->player_1 = $playerId;
        $this->players[0] = $playerId;
        $this->game->users()->save($this->game);
    }
    public function deleteGame(int $gameId)
    {
        $this->gameModel::find($gameId)->forceDelete();
    }
    public function connectToGame(int $gameId, int $playerId)
    {
        if (!in_array($playerId, $this->players))
            {
                $this->gameModel::find($gameId)->player_2 = $playerId;
                $this->players[] = $playerId;
                $this->game->users()->save($this->game);
            }
    }
}
