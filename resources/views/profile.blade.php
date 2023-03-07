@extends('layouts.base')

@section('title', 'Профиль')

@section('main')
    <section id="main-content">
        <div class="container-fluid">
            <h1 class="text-center">Мой профиль</h1>
            <hr>
            <div class="row">
                <div class="col-sm-3 p-1">
                    <div class="wrapper border-dark border p-1 w-100 h-100">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Имя: {{$user->name}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>К-Н рейтинг: {{10}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Шаш рейтинг: {{1200}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Шах рейтинг: {{5000}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-center p-1">
                    <div class="wrapper border-dark border w-100 h-100">
                        <h3>Описание: </h3><br>
                        <span>{{$user->description}}</span>
                    </div>
                </div>
                <div class="col-sm-3 p-1">
                    <div class="wrapper border-dark border p-1 w-100 h-100">
                        <h3>Фото: </h3><br>
                        <img class="embed-responsive profile-image" src="{{asset('photo\\'.$user->photo)}}" alt="Фото профиля"/>
                    </div>
                </div>
            </div>
            @if(\Illuminate\Support\Facades\Auth::id() == $user->id)
                <hr>
                <div class="text-center">
                    <form action="{{route("logout")}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выйти из профиля</button>
                    </form>
                    <hr>
                </div>

                <div class="text-center">
                    <form action="{{route("edit_profile", ['id' => $user->id])}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-3 my-auto">
                                <label for="name" class="h-100 w-100 my-auto">
                                    <h4>Новое Имя</h4>
                                    <textarea id="name" name="name" class="form-control" type="text" placeholder="{{$user->name}}"></textarea>
                                </label>
                            </div>
                            <div class="col-sm-6">
                                <label for="description" class="h-100 w-100">
                                    <h4>Новое Описание</h4>
                                    <textarea id="description" name="description" class="form-control" type="text" placeholder="{{$user->description}}"></textarea>
                                </label>
                            </div>
                            <div class="col-sm-3 my-auto">
                                <label for="photo" class="h-100 w-100">
                                    <h4>Новое Фото</h4>
                                    <input class="my-auto btn btn-success" type="file" name="photo" accept="image/jpeg,image/png,image/gif">
                                </label>
                            </div>
                        </div>
                        <div class="row text-center">
                            <label for="sub" class="h-100 w-100">
                                <input class="btn btn-info" type="submit" id="sub" value="Изменить данные профиля">
                            </label>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </section>
@endsection
