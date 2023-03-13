@extends('layouts.base')

@section('title', 'Лобби - Крестики-Нолики')

@section('main')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center p-5">
                    <h2>Крестики-Нолики</h2>
                </div>
            </div>
            <livewire:cross-checkers-lobby />
        </div>
@endsection
