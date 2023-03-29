<?php

namespace App\Interfaces;

interface GameInterface
{
    public function createGame(int $playerId);
    public function deleteGame($nameOfGameModel, int $gameId);
    public function fastConnectToGame($nameOfGameModel, int $playerId);
    public function connectToGame($nameOfGameModel, int $gameId, int $playerId);
}
