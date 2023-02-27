@extends('layouts.base')

@section('title', 'Игра')

@section('main')
    <section id="head">
        <div class="container-fluid">
            <hr>
            <div class="row text-center">
                <div class="offset-3 col-sm-6">
                    <h2>Крестики-Нолики</h2>
                </div>
            </div>
            <hr>
        </div>
    </section>
    @livewire('game')
@endsection
