<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CrossCheckersGame extends Component
{
    public $game_id;
    public function mount($game_id)
    {
        $this->game_id = $game_id;
    }
    public function render()
    {
        return view('livewire.cross-checkers-game');
    }
}
