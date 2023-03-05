<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @livewireStyles
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <section id="navigation">
        <div class="container-fluid">
            <div class="row bg-dark text-center">

                @auth
                        <div class="col-sm-4 my-auto"><a class="nav-link" href="{{route('to_landing_page')}}">На главную</a></div>
                        <div class="col-sm-4 my-auto"><a class="nav-link" href="{{route('to_catalog_page')}}">Каталог игр</a></div>
                        <div class="col-sm-4 my-auto"><a class="nav-link" href="{{route('to_profile_page', ['id' => \Illuminate\Support\Facades\Auth::id()])}}">Профиль</a></div>
                @endauth
                @guest
                        <div class="col-sm-4 my-auto"><a class="nav-link" href="{{route('to_landing_page')}}">На главную</a></div>
                        <div class="col-sm-4 my-auto"><a class="nav-link" href="{{route('to_catalog_page')}}">Каталог игр</a></div>
                        <div class="col-sm-4 my-auto"><a class="nav-link disabled" href="#">Для доступа к профилю: <br> зарегистрируйтесь или войдите в аккаунт</a></div>
                @endguest
            </div>
        </div>
    </section>

    @yield('main')

    <section id="footer">
        <footer class="container-fluid bg-dark text-white">
            <div class="row">

                <div class="col-md-4 col-sm-4 text-center">
                    <h2>@Derfing</h2>
                </div>

                <div class="col-md-2 col-sm-4 text-center h4">
                    <a href="https://vk.com/derfing">Вконтакте</a>
                </div>

                <div class="col-md-2 col-sm-4 text-center h4">
                    <a href="https://t.me/derfing">Телеграмм</a>
                </div>

                <div class="col-md-2 col-sm-4 text-center h4">
                    <a href="mailto:derendaevkosta45@gmail.com">Электронная почта</a>
                </div>

                <div class="col-md-2 col-sm-4 text-center h4">
                    <a href="https://github.com/Derfing">GitHub</a>
                </div>

            </div>
        </footer>
    </section>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    </body>
</html>
