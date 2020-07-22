@extends('layout.base')

@section('titulo', 'Home')
@section('conteudo')
    <!-- MAIN CONTAINER -->
    <section class="main-container" >

        @foreach($categorias as $categoria)
            <div class="location" id="{{ $categoria->nome }} ">
                <h5 id="{{ $categoria->nome }}" class="title">{{ $categoria->nome }}</h5>
                <div class="box">
                    @foreach(App\Conteudo::buscar_por_categoria($categoria->id) as $item)
                        @php 
                             $c = App\Categoria::buscar_por_id($item->categoria_id)[0];
                             $s = App\Servico::buscar_por_id($c->servico_id)[0];
                        @endphp
                        <a href="{{ route('videos', ['servico' => $s->nome , 'id' => $item->id]) }}"><img src="{{ url ($item->imagem) }}" alt="{{$item->titulo}}"></a>
                    @endforeach
                </div>
            </div>
        @endforeach

     
    <!-- END OF MAIN CONTAINER -->

    
@endsection

