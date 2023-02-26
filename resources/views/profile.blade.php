@extends('layouts.base')

@section('title', 'Профиль')

@section('main')
    <section id="main-content">
        <div class="container-fluid">
            <h1 class="text-center">Мой профиль</h1>
            <hr>
            <div class="text-center">
                <form action="{{route("logout")}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Выйти из профиля</button>
                </form>
                <hr>
            </div>
        </div>
    </section>
@endsection
