<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CrossCheckersController;
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

Route::get('/catalog', [Controller::class, 'catalog'])->name("to_catalog_page");

Route::get('/profile/{id}', [Controller::class, 'profile'])->name("to_profile_page");

Route::get('/cross-checkers-lobby', [LobbyController::class, 'cross_checkers_lobby'])->name("to_cross_checkers_lobby_page");

Route::get('/cross-checkers-lobby/{id}', [CrossCheckersController::class, 'cross_checkers_game'])->name("to_cross_checkers_game_page");

Auth::routes();
