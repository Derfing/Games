@extends('layouts.base')

@section('title', 'Крестики-Нолики - Игра')

@section('main')
    <div class="container-fluid">
        <livewire:cross-checkers-game :gameId="$id"/>
    </div>
@endsection
