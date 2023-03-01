<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LobbyController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'landing'])->name("to_landing_page");

Route::get('/cat', [Controller::class, 'catalog'])->name("to_catalog_page");

Route::get('/profile/{id}', [Controller::class, 'profile'])->name("to_profile_page");

Route::get('/tic-tac-lobby', [LobbyController::class, 'tic_tac_lobby'])->name("to_tic_tac_lobby_page");

Route::get('/game', [GameController::class, 'render'])->name("to_game_page");

Auth::routes();
