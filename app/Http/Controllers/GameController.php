<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function render()
    {
        return view('game');
    }

    public function getInLobby()
    {
        return view('lobby');
    }
}
