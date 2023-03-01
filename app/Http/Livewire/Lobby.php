<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Tic_Tac;
use App\Models\User;
class Lobby extends Component
{
    public Tic_Tac $game;
    public $lobby;

    public function mount()
    {
        $this->showOpenedGames();
    }
    public function createNewGame(){
        $game = new Tic_Tac();
        $game->player_1 = Auth::id();
        $game->users()->save($game);
    }
    public function fastConnectToGame(){
        $game = Tic_Tac::where('player_2', null)->first();
        $game->player_2 = Auth::id();
        $game->users()->save($game);
    }
    public function connectToGame($id)
    {
        $game = Tic_Tac::where('id', $id)->first();
        $game->player_2 = Auth::id();
        $game->users()->save($game);
    }
    public function showOpenedGames(){
        if (Tic_Tac::where('player_2', null)->first())
            $this->lobby = Tic_Tac::where('player_2', null)->get();
        else
            $this->lobby = null;
    }
}
