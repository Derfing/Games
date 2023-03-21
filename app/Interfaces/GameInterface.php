<?php

namespace App\Interfaces;

interface GameInterface
{
    public function createGame(int $playerId);
    public function deleteGame(int $gameId);
    public function connectToGame(int $gameId, int $playerId);
}
