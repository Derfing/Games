@extends('layouts.base')

@section('title', 'Приветственная страница')

@section('main')
    <section id="header">
        <div class="container-fluid">
            <div class="wrap">
                <h1 class="text-center">Добро пожаловать!</h1>
                <hr>
                <div class="row">
                    <div class="offset-3 col-sm-3">
                        <a href="#" class="btn btn-lg btn-primary w-100 h-100">Войти</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="btn btn-lg btn-info w-100 h-100">Зарегистрироваться</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
