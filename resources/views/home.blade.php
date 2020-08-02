
@extends('layouts.base')

@section('title', 'Início')


@section ('color-body', 'bg-black-14')

@section('menu')
    @include('layouts.menu')
@endsection

@section('content')
<div class="slider">
        <h3>Mais Vistos</h3>
        <span onmouseover="scrollEsquerda('scroller_mais_vistos')" onmouseout="clearScroll()" class="handle handlePrev active">
            <i class="fa my-fa fa-caret-left" aria-hidden="true"></i>
        </span>

        <div id="scroller_mais_vistos" class="row">
            <div class="row__inner">
                @foreach($conteudos as $conteudo)
                    <div class="gui-card">
                        <div class="gui-card__media">
                            <img class="gui-card__img" src="{{ URL::asset('storage/'.$conteudo->imagem) }}" alt=""  />
                        </div>
                        <div class="gui-card__details">
                            <div class="gui-card__title">
                                {{ $conteudo->titulo }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <span onmouseover="scrollDireita('scroller_mais_vistos')" onmouseout="clearScroll()"  class="handle handleNext active">
            <i class="fa my-fa fa-caret-right" aria-hidden="true"></i>
        </span>
    </div>



    <div class="slider mt-5">
        <h3>Lançamentos</h3>
        <span onmouseover="scrollEsquerda('scroller_lancamentos')" onmouseout="clearScroll()" class="handle handlePrev active">
            <i class="fa my-fa fa-caret-left" aria-hidden="true"></i>
        </span>

        <div id="scroller_lancamentos" class="row">
            <div class="row__inner">
                @foreach($conteudos as $conteudo)
                    <div class="gui-card">
                        <div class="gui-card__media">
                            <img class="gui-card__img" src="{{ URL::asset('storage/'.$conteudo->imagem) }}" alt=""  />
                        </div>
                        <div class="gui-card__details">
                            <div class="gui-card__title">
                                {{ $conteudo->titulo }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <span onmouseover="scrollDireita('scroller_lancamentos')" onmouseout="clearScroll()"  class="handle handleNext active">
            <i class="fa my-fa fa-caret-right" aria-hidden="true"></i>
        </span>
    </div>

@endsection