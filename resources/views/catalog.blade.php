@extends('layouts.base')

@section('title', 'Каталог игр')

@section('main')
    <section id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center p-5"><h4>Каталог игр</h4></div>
            </div>

            <div class="card-header">
                <div class="row p-1">
                    <div class="col-12 text-center">
                        <h2>Крестики - Нолики</h2>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row p-1">
                    <div class="col-md-3 text-center">
                        <img class="catalog-image embed-responsive h-100 w-100" src="https://cdn-icons-png.flaticon.com/512/250/250767.png">
                    </div>
                    <div class="col-md-9">Крестики-нолики — логическая игра между двумя противниками на квадратном поле 3 на 3 клетки или бо́льшего размера (вплоть до «бесконечного поля»). Один из игроков играет «крестиками», второй — «ноликами». В традиционной китайской игре Гомоку используются чёрные и белые камни.</div>
                </div>
                <div class="row">
                    <div class="col-12"><a href="{{route('to_cross_checkers_lobby_page')}}" type="button" class="btn-lg btn-success text-center w-100 h-100 my-auto">Играть</a></div>
                </div>
            </div>

            <div class="card-header">
                <div class="row p-1">
                    <div class="col-12 text-center">
                        <h2>Шашки</h2>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row p-1">
                    <div class="col-md-3 text-center">
                        <img class="catalog-image embed-responsive h-100 w-100" src="https://u7.uidownload.com/vector/762/202/vector-draughts-board-vector-eps-ai.jpg">
                    </div>
                    <div class="col-md-9">Шашки — логическая настольная игра для двух игроков, заключающаяся в передвижении определённым образом фишек-шашек по клеткам шашечной доски. Во время партии каждому игроку принадлежат шашки одного цвета: чёрного или белого (иногда других цветов, один из которых считается тёмным, а другой — светлым). Цель игры — взять все шашки соперника или лишить их возможности хода (запереть). Существует несколько вариантов шашек, различающихся правилами и размерами игрового поля.</div>
                </div>
                <div class="row">
                    <div class="col-12"><a href="#" type="button" class="btn-lg btn-success text-center w-100 h-100 my-auto">Играть</a></div>
                </div>
            </div>
            <div class="card-header">
                <div class="row p-1">
                    <div class="col-12 text-center">
                        <h2>Шахматы</h2>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <div class="row p-1">
                    <div class="col-md-3 text-center">
                        <img class="catalog-image embed-responsive h-100 w-100" src="https://i.pinimg.com/originals/e3/bb/12/e3bb1269580b9d73cecdd8ddcb832e25.jpg">
                    </div>
                    <div class="col-md-9">Шахматы — настольная логическая игра с шахматными фигурами на 64-клеточной доске, сочетающая в себе элементы искусства (в том числе в части шахматной композиции), науки и спорта. В шахматы обычно играют два игрока (именуемые шахматистами) друг против друга. Также возможна игра одной группы шахматистов против другой или против одного игрока, такие партии зачастую именуются консультационными. Кроме того, существует практика сеансов одновременной игры, когда против одного сильного игрока играет несколько противников, каждый на отдельной доске.</div>
                </div>
                <div class="row">
                    <div class="col-12"><a href="{{route('to_cross_checkers_lobby_page')}}" type="button" class="btn-lg btn-success text-center w-100 h-100 my-auto">Играть</a></div>
                </div>
            </div>
        </div>
    </section>
@endsection
