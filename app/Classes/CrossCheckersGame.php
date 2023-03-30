<?php

namespace App\Classes;

use App\Models\CrossCheckers;

class CrossCheckersGame
{
    private $game;
    public $player_1;
    public $player_2;
    public $moves;

    public function __construct($id)
    {
        $game = CrossCheckers::find($id);
        $this->player_1 = $game->player_1;
        $this->player_2 = $game->player_2;
        $this->moves = $this->getMovesArray();
    }

    public function calculateGameResult()
    {
        $mass = $this->getBoardArray();

        if ($mass[0] == $mass[1] && $mass[1] == $mass[2] && $mass[2] != null) {
            return $this->getPlayerIdWithSymbol($mass[2]);
        } elseif ($mass[0] == $mass[4] && $mass[4] == $mass[8] && $mass[8] != null) {
            return $this->getPlayerIdWithSymbol($mass[8]);
        } elseif ($mass[0] == $mass[3] && $mass[3] == $mass[6] && $mass[6] != null) {
            return $this->getPlayerIdWithSymbol($mass[6]);
        } elseif ($mass[6] == $mass[7] && $mass[7] == $mass[8] && $mass[8] != null) {
            return $this->getPlayerIdWithSymbol($mass[8]);
        } elseif ($mass[2] == $mass[5] && $mass[5] == $mass[8] && $mass[8] != null) {
            return $this->getPlayerIdWithSymbol($mass[8]);
        } elseif ($mass[1] == $mass[4] && $mass[4] == $mass[7] && $mass[7] != null) {
            return $this->getPlayerIdWithSymbol($mass[7]);
        } elseif ($mass[3] == $mass[4] && $mass[4] == $mass[5] && $mass[5] != null) {
            return $this->getPlayerIdWithSymbol($mass[5]);
        } elseif ($mass[2] == $mass[4] && $mass[4] == $mass[6] && $mass[6] != null) {
            return $this->getPlayerIdWithSymbol($mass[5]);
        } else if ($this->getCountOfMoves() > 9) {
            return 'Draw';
        }
    }

    public function getMovesArray()
    {
        $data = $this->game->hist;
        $temp = explode('|', $data);
        for ($i = 0; $i < count($temp) - 1; $i++) {
            $mass = explode('-', $temp[$i]);
            $result[] =
                [
                    'userId' => $mass[0],
                    'buttonId' => $mass[1],
                    'symbol' => $mass[2]
                ];
        }
        return $result;
    }

    public function move($userId, $buttonId)
    {
        if ($userId != $this->getLastPlayerId() && (in_array($userId, [$this->player_1, $this->player_2]))) {
            if ($this->player_1 == $userId) {
                $symbol = 'X';
            } else if ($this->player_2 == $userId) {
                $symbol = 'O';
            }

            if (preg_match("/-$buttonId/", $this->game->hist) == 0) {
                $move = str($userId) . '-' . str($buttonId) . '-' . $symbol;
                $this->game->hist .= $move . '|';
                $this->game->save();
            }
        }
    }

    public function getBoardArray()
    {
        $result = [null, null, null, null, null, null, null, null, null];

        foreach ($this->moves as $move) {
            $result[$move['buttonId']] = $move['symbol'];
        }

        return $result;
    }

    public function getPlayerIdWithSymbol($symbol)
    {
        if ($symbol == 'X') {
            return $this->player_1;
        } else {
            return $this->player_2;
        }
    }

    public function getCountOfMoves()
    {
        return count($this->moves);
    }

    public function getLastPlayerId()
    {
        return end($this->moves)['userId'];
    }
}
