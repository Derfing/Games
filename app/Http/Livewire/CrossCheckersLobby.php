<?php

namespace App\Http\Livewire;

use App\Models\Tic_Tac;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CrossCheckersLobby extends Component
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
        $this->redirect("/cross-checkers-lobby/$game->id");
    }
    public function fastConnectToGame(){
        $game = Tic_Tac::where('player_2', null)->first();
        $game->player_2 = Auth::id();
        $game->users()->save($game);
        $this->redirect("/cross-checkers-lobby/$game->id");
    }
    public function connectToGame($id)
    {
        $game = Tic_Tac::where('id', $id)->first();
        if($game->player_2 == null)
        {
            $game->player_2 = Auth::id();
            $game->users()->save($game);
        }
        $this->redirect("/cross-checkers-lobby/$game->id");
    }
    public function showOpenedGames(){
        if (Tic_Tac::where('player_2', null)->first())
            $this->lobby = Tic_Tac::where('player_2', null)->get();
        else
            $this->lobby = null;
    }
}
