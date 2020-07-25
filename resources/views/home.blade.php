
@extends('layouts.base')

@section('title', 'Início')


@section ('color-body', 'bg-black-14')

@section('menu')
    @include('layouts.menu')
@endsection

@section('content')
<span>
    <h4 class="text-white mt-3 mb-3"> Mais Vistos </h4>
</span>
<div class="card-group text-center">
    @foreach(range(0,5) as $item)
        <div class="card m-1">
            <a class="card-body" href="#">
                <img class="img-play" src="{{ URL::asset('images/play.png') }}" alt="Card image cap">
            </a>
        </div>
    @endforeach
</div>
@endsection