<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LobbyController extends Controller
{
    public function tic_tac_lobby()
    {
        return view('tic_tac_lobby');
    }
}
