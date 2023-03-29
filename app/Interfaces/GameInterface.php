<?php

namespace App\Interfaces;

interface GameInterface
{
    static function createGame(int $playerId);
    static function deleteGame($nameOfGameModel, int $gameId);
    static function fastConnectToGame($nameOfGameModel, int $playerId);
    static function connectToGame($nameOfGameModel, int $gameId, int $playerId);
}
