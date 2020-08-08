<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/detalhes.css') }}">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        
        <script src="{{ URL::asset('js/home.js') }}"></script>

        <title>Giga Play - @yield('title')</title>
    </head>
    <body class="bg-black-14 @yield('color-body')">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-black">
                <a class="navbar-brand" href="home"><img class="image-logo" src="{{ URL('images/logo.png') }}" alt="Giga Play" width=150></a>
                @yield('menu')
            </nav>
        </header>
        
        <main>
            <div class="content p-3">
                @yield('content')
                
                @include('modals.conteudo.detalhes')
                @include('modals.conteudo.player')
                
                @include('modals.servico.view')

                @include('modals.categoria.view')

                @include('modals.funcionario.view')
            </div>
        </main>        
    </body>
</html>
