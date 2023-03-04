<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrossCheckersController extends Controller
{
    public function cross_checkers_game($id)
    {
        return view('cross_checkers_game', ['id' => $id]);
    }
}
