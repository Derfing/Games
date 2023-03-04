@extends('layouts.base')

@section('title', 'Крестики-Нолики - Игра')

@section('main')
    <section id="cross-checkers">
        <div class="container-fluid">
            <livewire:cross-checkers-game :game_id="$id"/>
        </div>
    </section>
@endsection
