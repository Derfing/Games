<div>
    @auth()
        <div class="row">
            <div class="col-sm-6 text-center">
                <button class="w:100 h:100 btn btn-info" wire:click="createNewGame">Создать новую игру</button>
            </div>
            <div class="col-sm-6 text-center">
                <button class="w:100 h:100 btn btn-info" wire:click="fastConnectToGame">Быстрое подключение к игре</button>
            </div>
        </div>
        <div wire:poll="showOpenedGames">
            @if ($lobby)
                @foreach($lobby as $game)
                    <div class="row p-1">
                        <div class="offset-1 col-sm-10 text-center card-body">
                            <h4>Игра №{{$game->id}}</h4>
                            <button class="btn btn-success text-center w:100 h:100" wire:click="connectToGame({{$game->id}})">Присоединиться</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row text-center p-1">
                    <div class="col-sm-10 offset-1 card-body">
                        <h4>Ищем свободные игры...</h4>
                    </div>
                </div>
            @endif
        </div>
    @endauth
    @guest()
        <div class="row p-1">
            <div class="offset-3 col-sm-6">
                <h2>Для доступа к играм, пожалуйста, зарегистрируйтесь.</h2>
            </div>
        </div>
    @endguest
</div>
