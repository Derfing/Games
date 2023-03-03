<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LobbyController extends Controller
{
    public function cross_checkers_lobby()
    {
        return view('cross_checkers_lobby');
    }
}
