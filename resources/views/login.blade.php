@extends('layouts.base')

@section('title', 'Login')

@section ('color-body', 'bg-black')

@section('content')
    <div class="d-flex justify-content-center w-100 mt-5" >
        <div class="card rounded-0 bg-white" style="width: 26rem;">
            <div class="card-body">
                <h2 class="mb-4"> Entrar </h2>

                <form>
                    <div class="pl-3 pr-3">
                        <label>Email</label>
                        <input type="email" class="form-control">
                    </div>

                    <div class="form-group pl-3 pr-3">
                        <label>Senha</label>
                        <a href="#" class="float-right">Mostrar senha</a>
                        <input type="password" class="form-control">
                    </div>

            
        
                    <div class="form-group pl-3 pr-3 mt-5">
                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </div>

                    <div class="row pl-5 pr-5 mb-3">
                        <div class="col">
                            <input type="checkbox" name="remember password" /> Lembrar Senha
                        </div>

                        <div class="col float-right">
                            <a href="#">Esqueci a senha</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection