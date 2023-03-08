<div>
    <div class="row">
        <div class="col-sm-5 text-center pt-5">
            <div class="game-prev-wrapper d-flex">
                <img class="game-prev" src="{{asset('photo/' . \App\Models\User::where('id', $game->player_1)->first()->photo)}}">
            </div>
            <h1>{{\App\Models\User::where('id', $game->player_1)->first()->name}}</h1>
        </div>
        <div class="col-sm-2 text-center my-auto pt-5">
            <h1>VS</h1>
        </div>
        @if ($game->player_2 != null)
        <div class="col-sm-5 text-center pt-5">
            <div class="game-prev-wrapper d-flex">
                <img class="game-prev" src="{{asset('photo/' . \App\Models\User::where('id', $game->player_2)->first()->photo)}}">
            </div>
            <h1>{{\App\Models\User::where('id', $game->player_2)->first()->name}}</h1>
        </div>
        @endif
    </div>
    <div wire:poll.1000ms="get_hist">
        @if (!$game->winner)
            <div class="p-0 mx-auto">
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 0)'
                            class="btn btn-light text-center border-dark btn-square {{$history[0]}}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 1)'
                            class="btn btn-light text-center border-dark btn-square {{$history[1]}}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 2)'
                            class="btn btn-light text-center border-dark btn-square {{$history[2]}}"></button>
                </div>
            </div>

            <div class="p-0">
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 3)'
                            class="btn btn-light text-center border-dark btn-square {{$history[3]}}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 4)'
                            class="btn btn-light text-center border-dark btn-square {{$history[4]}}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 5)'
                            class="btn btn-light text-center border-dark btn-square {{$history[5]}}"></button>
                </div>
            </div>

            <div class="p-0">
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 6)'
                            class="btn btn-light text-center border-dark btn-square {{$history[6]}}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 7)'
                            class="btn btn-light text-center border-dark btn-square {{$history[7]}}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 8)'
                            class="btn btn-light text-center border-dark btn-square {{$history[8]}}"></button>
                </div>
            </div>
        @else
            <div class="row p-5">
                <div class="col-sm-12"><h1>Победитель - {{\App\Models\User::where('id', $game->winner)->first()->name}}</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-12"><h1><a href="{{route('to_cross_checkers_lobby_page')}}">Вернуться назад</a></h1>
                </div>
            </div>
        @endif
    </div>
</div>
