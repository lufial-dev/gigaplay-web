
@extends('layouts.base')

@section('title', 'Início')


@section ('color-body', 'bg-black-14')

@section('menu')
    @include('layouts.menu')
@endsection

@section('content')
<div class="slider">
        <h5 class="text-white">Mais Vistos</h5>
        <span onmousedown="scrollEsquerda('scroller_mais_vistos')" onmouseup="clearScroll()" class="handle handlePrev active">
            <i class="fa my-fa fa-caret-left" aria-hidden="true"></i>
        </span>

        <div id="scroller_mais_vistos" class="row">
            <div class="row__inner">
                @foreach($mais_vistos as $conteudo) 
                <a  href="#" data-toggle="modal" data-target=".detalhes-modal" onclick="detalhesShow( {{ $conteudo }})">
                    <div class="gui-card">
                        <div class="gui-card__media">
                           
                                <img class="gui-card__img" src="{{ URL::asset('storage/'.$conteudo->imagem) }}" alt=""  />
                        
                        </div>
                        <div class="gui-card__details">
                            <div class="gui-card__title text-white">
                                {{ $conteudo->titulo }}
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>

        <span onmouseover="scrollDireita('scroller_mais_vistos')" onmouseout="clearScroll()"  class="handle handleNext active">
            <i class="fa my-fa fa-caret-right" aria-hidden="true"></i>
        </span>
    </div>



    <div class="slider mt-1">
        <h5 class="text-white">Lançamentos</h5>
        <span onmouseover="scrollEsquerda('scroller_lancamentos')" onmouseout="clearScroll()" class="handle handlePrev active">
            <i class="fa my-fa fa-caret-left" aria-hidden="true"></i>
        </span>

        <div id="scroller_lancamentos" class="row">
            <div class="row__inner">
                @foreach($lancamentos as $conteudo)
                    <div class="gui-card">
                        <div class="gui-card__media">
                            <img class="gui-card__img" src="{{ URL::asset('storage/'.$conteudo->imagem) }}" alt=""  />
                        </div>
                        <div class="gui-card__details">
                            <div class="gui-card__title text-white">
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

    @for($i=0; $i < count($generos) ; $i++)
        @if(count( $filmes[$i]) > 1 )
            @php $id_class = 'scroller_filmes_'.$generos[$i]->nome; @endphp
            <div class="slider mt-1">
                <h5 class="text-white">Filmes de {{ $generos[$i]->nome }}</h5>
                <span onmouseover="scrollEsquerda( '{{  $id_class  }}' )" onmouseout="clearScroll()" class="handle handlePrev active">
                    <i class="fa my-fa fa-caret-left" aria-hidden="true"></i>
                </span>

                <div id= {{ $id_class }} class="row">
                    <div class="row__inner">
                        @foreach( $filmes[$i] as $conteudo)
                            <div class="gui-card">
                                <div class="gui-card__media">
                                    <img class="gui-card__img" src="{{ URL::asset('storage/'.$conteudo->imagem) }}" alt=""  />
                                </div>
                                <div class="gui-card__details">
                                    <div class="gui-card__title text-white">
                                        {{ $conteudo->titulo }}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <span onmouseover="scrollDireita( '{{ $id_class }}' )" onmouseout="clearScroll()"  class="handle handleNext active">
                    <i class="fa my-fa fa-caret-right" aria-hidden="true"></i>
                </span>
            </div>
        @endif

    @endfor

@endsection