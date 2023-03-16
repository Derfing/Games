<div>
    @auth()
        <div class="row">
            <div class="col-6 text-center">
                <button class="btn btn-lg btn-info h-100" wire:click="createNewGame">Создать новую игру</button>
            </div>
            @if ($count_opened_games > 0)
                <div class="col-6 text-center h-100">
                    <button class="btn btn-lg btn-info" wire:click="fastConnectToGame">Быстрое подключение к игре</button>
                </div>
            @else
                <div class="col-6 text-center h-100">
                    <button class="btn btn-lg btn-info disabled">Нет свободных игр</button>
                </div>
            @endif
        </div>

        <div wire:poll="showOpenedGames">
            @if ($lobby)
                @foreach ($lobby as $game)
                    <div class="row p-2">
                        <div class="mx-auto p-2 col-6 text-center game-card">
                            <h4>Игра №{{ $game->id }}</h4>
                            <button class="btn btn-success text-center w:100 h:100"
                                wire:click="connectToGame({{ $game->id }})">Присоединиться</button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row text-center p-3">
                    <div class="col-10 offset-1 game-card">
                        <h4>Ищем свободные игры...</h4>
                    </div>
                </div>
            @endif
        </div>
    @endauth
    @guest()
        <div class="row p-1">
            <div class="col-12 text-center">
                <h2>Для доступа к играм, пожалуйста, зарегистрируйтесь.</h2>
            </div>
        </div>
    @endguest
</div>
