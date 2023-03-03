<div class="lobby-wrap">
    @auth()
        <div class="row">
            <div class="col-sm-6 text-center">
                <button class="w:100 h:100 btn btn-info" wire:click="createNewGame">Создать новую игру</button>
            </div>
            <div class="col-sm-6 text-center">
                <button class="w:100 h:100 btn btn-info" wire:click="fastConnectToGame">Быстрое подключение к игре</button>
            </div>
        </div>
        <hr>
        <div wire:poll="showOpenedGames" class="row">
            @if ($lobby)
                @foreach($lobby as $game)
                    <div class="row card-body">
                        <div class="col-sm-12 text-center">
                            <h4>Игра №{{$game->id}}</h4>
                            <button class="btn btn-success text-center w:100 h:100" wire:click="connectToGame({{$game->id}})">Присоединиться</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row text-center card-body">
                    <div class="col-sm-12">
                        <h4>Ищем свободные игры...</h4>
                    </div>
                </div>

            @endif

        </div>
    @endauth
    @guest()
        <div class="row">
            <div class="offset-3 col-sm-6">
                <h2>Для доступа к играм, пожалуйста, зарегистрируйтесь.</h2>
            </div>
        </div>
    @endguest
</div>
