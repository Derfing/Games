<div>
    <button class="btn btn-info" wire:click="createNewGame">createNewGame</button>
    <div wire:poll class="btn disabled">
        @if($lobby)
            @foreach($lobby as $lb)
                <div>{{$lb->player_1}}</div>
                <br>
            @endforeach
        @endif
    </div>
    <button class="btn btn-info" wire:click="connectToGame">connectToGame</button>
    <button class="btn btn-info" wire:click="showOpenGames">showOpenGames</button>
</div>
