<div>
    <div class="row">
        <div class="col-5 text-center">
            <div class="game-prev-wrapper d-flex">
                <img class="game-prev"
                    src="{{ asset('photo/' . \App\Models\User::where('id', $game->player_1)->first()->photo) }}">
            </div>
            <span class="in-game-nickname">{{ \App\Models\User::where('id', $game->player_1)->first()->name }}</span>
        </div>
        <div class="col-2 text-center my-auto">
            <span class="in-game-nickname">VS</span>
        </div>
        @if ($game->player_2 != null)
            <div class="col-5 text-center">
                <div class="game-prev-wrapper d-flex">
                    <img class="game-prev"
                        src="{{ asset('photo/' . \App\Models\User::where('id', $game->player_2)->first()->photo) }}">
                </div>
                <span
                    class="in-game-nickname">{{ \App\Models\User::where('id', $game->player_2)->first()->name }}</span>
            </div>
        @endif
    </div>
    <div wire:poll.1000ms="get_hist">
        @if (!$game->winner)
            <div class="pb-1 mx-auto">
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 0)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[0] }}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 1)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[1] }}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 2)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[2] }}"></button>
                </div>
            </div>

            <div class="pb-1">
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 3)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[3] }}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 4)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[4] }}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 5)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[5] }}"></button>
                </div>
            </div>

            <div class="p-0">
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 6)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[6] }}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 7)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[7] }}"></button>
                </div>
                <div class="d-inline">
                    <button wire:click='btn({{ \Illuminate\Support\Facades\Auth::id() }}, 8)'
                        class="btn btn-light text-center border-dark btn-square {{ $history[8] }}"></button>
                </div>
            </div>
        @elseif(is_string($game->winner))
            <div class="row p-5">
                <div class="col-sm-12">
                    <h1>{{ $game->winner }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h1><a href="{{ route('to_cross_checkers_lobby_page') }}">Вернуться назад</a></h1>
                </div>
            </div>
        @else
            <div class="row p-5">
                <div class="col-sm-12">
                    <h1>Победитель - {{ \App\Models\User::where('id', $game->winner)->first()->name }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h1><a href="{{ route('to_cross_checkers_lobby_page') }}">Вернуться назад</a></h1>
                </div>
            </div>
        @endif
    </div>
</div>
