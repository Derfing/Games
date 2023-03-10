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
    <body class="d-flex flex-column">
        <section id="header" class="bg-dark text-center align-items-center">
            <div class="container-fluid">
                <div class="row">
                    @auth
                        <div class="col-4 my-auto"><a class="nav-link" href="{{route('to_landing_page')}}">На главную</a></div>
                            <div class="col-4 my-auto"><a class="nav-link" href="{{route('to_catalog_page')}}">Каталог игр</a></div>
                            <div class="col-4 my-auto"><a class="nav-link" href="{{route('to_profile_page', ['id' => \Illuminate\Support\Facades\Auth::id()])}}">Профиль</a></div>
                    @endauth
                    @guest
                            <div class="col-4 my-auto"><a class="nav-link" href="{{route('to_landing_page')}}">На главную</a></div>
                            <div class="col-4 my-auto"><a class="nav-link" href="{{route('to_catalog_page')}}">Каталог игр</a></div>
                            <div class="col-4 my-auto"><a class="nav-link disabled" href="#">Для доступа к профилю: <br> зарегистрируйтесь или войдите в аккаунт</a></div>
                    @endguest
                </div>
            </div>
        </section>

        <section id="main" class="text-center align-items-center">
            @yield('main')
        </section>

        <section id="footer" class="bg-dark text-white text-center align-items-center">
            <footer class="container-fluid">
                <div class="row justify-content-around">
                    <div class="col-2 text-center my-auto">
                        <a class="footer-link">@Derfing</a>
                    </div>
                    <div class="col-2 text-center my-auto">
                        <a class="footer-link" href="https://vk.com/derfing">Вконтакте</a>
                    </div>
                    <div class="col-2 text-center my-auto">
                        <a class="footer-link" href="https://t.me/derfing">Телеграмм</a>
                    </div>
                    <div class="col-2 text-center my-auto">
                        <a class="footer-link" href="mailto:derendaevkosta45@gmail.com">Электронная почта</a>
                    </div>
                    <div class="col-2 text-center my-auto">
                        <a class="footer-link" href="https://github.com/Derfing">GitHub</a>
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
