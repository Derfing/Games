@extends('layouts.base')

@section('title', 'Лобби - Крестики-Нолики')

@section('main')
    <section id="lobby">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-3 col-sm-6 text-center">
                    <hr>
                    <h2>Крестики-Нолики</h2>
                    <hr>
                </div>
            </div>
            @livewire('lobby')
        </div>
    </section>
@endsection
