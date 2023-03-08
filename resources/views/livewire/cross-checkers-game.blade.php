<div>
    <div class="row">
        <div class="col-sm-12 text-center p-3">
            <h1>Крестики - Нолики</h1>
        </div>
    </div>
    <div class="game-wrap text-center" wire:poll.1000ms="get_hist">
        @if (!$game->winner)
            <div class="row">
                <div class="offset-3 col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 0)'
                            class="btn btn-light text-center border-dark btn-square {{$history[0]}}"></button>
                </div>
                <div class="col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 1)'
                            class="btn btn-light text-center border-dark btn-square {{$history[1]}}"></button>
                </div>
                <div class="col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 2)'
                            class="btn btn-light text-center border-dark btn-square {{$history[2]}}"></button>
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 3)'
                            class="btn btn-light text-center border-dark btn-square {{$history[3]}}"></button>
                </div>
                <div class="col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 4)'
                            class="btn btn-light text-center border-dark btn-square {{$history[4]}}"></button>
                </div>
                <div class="col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 5)'
                            class="btn btn-light text-center border-dark btn-square {{$history[5]}}"></button>
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 6)'
                            class="btn btn-light text-center border-dark btn-square {{$history[6]}}"></button>
                </div>
                <div class="col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 7)'
                            class="btn btn-light text-center border-dark btn-square {{$history[7]}}"></button>
                </div>
                <div class="col-sm-2">
                    <button wire:click='btn({{\Illuminate\Support\Facades\Auth::id()}}, 8)'
                            class="btn btn-light text-center border-dark btn-square {{$history[8]}}"></button>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-sm-12"><h1>Победитель - {{$game->winner}}</h1></div>
            </div>
            <div class="row">
                <div class="col-sm-12"><h1><a href="{{route('to_cross_checkers_lobby_page')}}">Вернуться назад</a></h1>
                </div>
            </div>
        @endif
    </div>

</div>
