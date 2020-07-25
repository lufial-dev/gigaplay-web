@extends('layouts.base')

@section('title', 'Login')

@section ('color-body', 'bg-black')

@section('content')
<div class="d-flex justify-content-center w-100 mt-5" >
        <div class="card rounded-0 bg-white" style="width: 26rem;">
            <div class="card-body">
                <h2 class="mb-4"> Entrar </h2>
                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="pl-3 pr-3">
                            <label>{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group pl-3 pr-3 mt-3">
                                <label>{{ __('Senha') }}</label>
                                <a href="#" class="float-right">Mostrar Senha</a>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row pl-4 pr-4">
                            <div class="col form-check ">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label>{{ __('Mantenha-me Conectado') }}</label>
                            </div>

                            <div clss="col">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a Senha?') }}
                                    </a>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
