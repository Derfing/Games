<div wire:poll>
    <div class="btn disabled">
        @if($lobby)
            @foreach($lobby as $lb)
                <div>{{$lb->id}}</div>
                <br>
            @endforeach
        @endif
    </div>
    <button class="btn btn-info" wire:click="connectToGame">connectToGame</button>
    <button class="btn btn-info" wire:click="showOpenGames">showOpenGames</button>
</div>
