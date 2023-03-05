<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Tic_Tac;

class CrossCheckersGame extends Component
{
    public $game;
    public $history;
    public function mount($game_id)
    {
        $this->game = Tic_Tac::find($game_id);
        $this->history = array(" " , " ", " ", " ", " ", " ", " ", " ", " ");

    }
    public function render()
    {
        return view('livewire.cross-checkers-game');
    }

    public function btn($user_id, $button_id)
    {
        if($this->game->player_1 == $user_id)
            $symbol = 'X';
        else if ($this->game->player_2 == $user_id)
            $symbol = 'O';
        if(Auth::id() == $this->game->player_1 || Auth::id() == $this->game->player_2)
        {
            $this->game->hist .= str($user_id).'-'.str($button_id).'-'.$symbol.'|';
            $this->game->save();
        }
        //$this->game->winner = User::find($user_id)->id;

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
    }

}
