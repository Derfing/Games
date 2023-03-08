@extends('layouts.base')

@section('title', 'Приветственная страница')

@section('main')
    <div class="container-fluid">
        <h1 class="text-center">Добро пожаловать!</h1>
        @guest
            <div class="row">
                <div class="offset-sm-2 col-sm-4">
                    <a href="{{route("login")}}" class="btn btn-lg btn-primary w-100 h-100">Войти</a>
                </div>
                <div class="col-sm-4">
                    <a href="{{route("register")}}" class="btn btn-lg btn-info w-100 h-100">Зарегистрироваться</a>
                </div>
            </div>
        @endguest
        @auth
            <h3 class="text-center">Вы вошли как: {{\Illuminate\Support\Facades\Auth::user()->name}}</h3>
        @endauth
    </div>
@endsection
