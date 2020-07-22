@extends('layout.base')

@section('titulo', 'Home')
@section('conteudo')
    <!-- MAIN CONTAINER -->
    <section class="main-container" >
        <center>
            <div class="video-container">
                <video controls="controls" autoplay="autoplay" preload ='auto'>
                    <source src=" {{ url('conteudos/video.mp4') }}" type="video/mp4">
                    <object>
                        <embed src=" {{ url('conteudos/video.mp4') }}">
                    </object>
                </video>
        </div>
    </center>
     
    <!-- END OF MAIN CONTAINER -->

    
@endsection



