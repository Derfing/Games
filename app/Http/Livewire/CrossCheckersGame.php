<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Classes\CrossCheckersGame as Game;

class CrossCheckersGame extends Component
{
    public $game;
    public $history;
    public $temp;
    public function mount($gameId)
    {
        $this->game = new Game($gameId);
    }
    public function render()
    {
        return view('livewire.cross-checkers-game');
    }
}
