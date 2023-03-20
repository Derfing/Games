<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\CrossCheckers;

class CrossCheckersGame extends Component
{
    public $game;
    public $history;
    public $temp;
    public function mount($game_id)
    {
        $this->game = CrossCheckers::find($game_id);
        $this->history = array(" " , " ", " ", " ", " ", " ", " ", " ", " ");
        $this->get_hist();
    }
    public function render()
    {
        return view('livewire.cross-checkers-game');
    }

    public function btn($user_id, $button_id)
    {
        if ($user_id != $this->get_active_player_id()) {
            $symbol = " ";
            if ($this->game->player_1 == $user_id)
                $symbol = 'X';
            else if ($this->game->player_2 == $user_id)
                $symbol = 'O';
            $stage = str($user_id) . '-' . str($button_id) . '-' . $symbol;
            if (($user_id == $this->game->player_1 || $user_id == $this->game->player_2) && preg_match("/-$button_id/", $this->game->hist) == 0) {
                $this->game->hist .= $stage.'|';
                $this->game->save();
            }
            $this->get_hist();
        }
    }

    public function get_hist()
    {
        $history = $this->game->hist;
        $temp = explode('|', $history);
        for ($i = 0; $i < count($temp)-1; $i++)
        {
            $mass = explode('-', $temp[$i]);
            $this->history[$mass[1]] = $mass[2];
        }
        if (!$this->game->winner)
            $this->get_game_result();
    }

    public function get_num_of_stages()
    {
        $history = $this->game->hist;
        return count(explode('|', $history));
    }

    public function get_active_player_id()
    {
        $history = $this->game->hist;
        $temp = explode('|', $history);
        if (count($temp) > 1)
        {
            $mass = explode('-', $temp[$this->get_num_of_stages() - 2]);
            return (int)$mass[0];
        }
    }

    public function get_game_result()
    {
        $mass = & $this->history;

        if ($mass[0] == $mass[1] && $mass[1] == $mass[2] && $mass[2] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[2]);
        }
        elseif ($mass[0] == $mass[4] && $mass[4] == $mass[8] && $mass[8] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[8]);
        }
        elseif ($mass[0] == $mass[3] && $mass[3] == $mass[6] && $mass[6] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[6]);
        }
        elseif ($mass[6] == $mass[7] && $mass[7] == $mass[8] && $mass[8] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[8]);
        }
        elseif ($mass[2] == $mass[5] && $mass[5] == $mass[8] && $mass[8] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[8]);
        }
        elseif ($mass[1] == $mass[4] && $mass[4] == $mass[7] && $mass[7] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[7]);
        }
        elseif ($mass[3] == $mass[4] && $mass[4] == $mass[5] && $mass[5] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[5]);
        }
        elseif ($mass[2] == $mass[4] && $mass[4] == $mass[6] && $mass[6] != ' ')
        {
            $this->game->winner = $this->get_player_id($mass[5]);
        }
        else if ($this->get_num_of_stages() > 9)
        {
            $this->game->winner = "Ничья";
        }

        $this->game->save();
    }
    public function get_player_id($char)
    {
        if ($char == 'X')
        {
            return $this->game->player_1;
        }
        else
        {
            return $this->game->player_2;
        }
    }
}
