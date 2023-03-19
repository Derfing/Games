<?php

namespace App\Http\Livewire;

use App\Models\CrossCheckers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CrossCheckersLobby extends Component
{
    public CrossCheckers $game;
    public $lobby;
    public $count_opened_games;

    public function mount()
    {
        $this->checkOpenedGames();
        $this->showOpenedGames();
    }
    public function createNewGame(){
        $game = new CrossCheckers();
        $game->player_1 = Auth::id();
        $game->users()->save($game);
        $this->redirect("/cross-checkers-lobby/$game->id");
    }
    public function fastConnectToGame(){
        $game = CrossCheckers::where('player_2', null)->first();
        if ($game->player_1 != Auth::id())
        {
            $game->player_2 = Auth::id();
            $game->users()->save($game);
        }
        $this->redirect("/cross-checkers-lobby/$game->id");
    }
    public function connectToGame($id)
    {
        $game = CrossCheckers::where('id', $id)->first();
        if($game->player_2 == null && $game->player_1 != Auth::id())
        {
            $game->player_2 = Auth::id();
            $game->users()->save($game);
        }
        $this->redirect("/cross-checkers-lobby/$game->id");
    }
    public function showOpenedGames(){
        if (CrossCheckers::where('player_2', null)->first())
            $this->lobby = CrossCheckers::where('player_2', null)->get();
        else
            $this->lobby = null;
    }

    public function checkOpenedGames()
    {
        $this->count_opened_games = CrossCheckers::where('player_2', null)->count();
    }
}
