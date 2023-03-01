@extends('layouts.base')

@section('title', 'Профиль')

@section('main')
    <section id="main-content">
        <div class="container-fluid">
            <h1 class="text-center">Мой профиль</h1>
            <hr>
            <div class="text-center">
                @if(\Illuminate\Support\Facades\Auth::id() == $user->id)
                    <form action="{{route("logout")}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выйти из профиля</button>
                    </form>
                    <hr>
                @endif
                <h3 class="text-center">{{$user->name}}</h3>
            </div>
        </div>
    </section>
@endsection
