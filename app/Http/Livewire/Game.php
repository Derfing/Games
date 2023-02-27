<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Tic_Tac;
use App\Models\User;

class Game extends Component
{
    public Tic_Tac $game;
    public $lobby;

    public function createNewGame(){
        $game = new Tic_Tac();
        $game->player_1 = Auth::id();
        $game->users()->save($game);
    }

    public function connectToGame(){
        $game = Tic_Tac::where('player_2', null)->first();
        $game->player_2 = Auth::id();
        $game->users()->save($game);
    }

    public function showOpenGames(){
        $this->lobby = Tic_Tac::where('player_2', null)->get();
    }
}
