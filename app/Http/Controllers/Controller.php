<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Servico;
use App\Categoria;
use Illuminate\Http\Request;

class Controller extends BaseController
{   

    public function index(){
        $servicos = Servico::all();
        $categorias = Categoria::buscar_por_servico($servicos[0]->id);  
        $servico_selecionado = $servicos[0]->nome;      
        return view('conteudo', compact('servicos', 'servico_selecionado', 'categorias'));
    }

    public function player_video(Request $request){
        $servicos = Servico::all();
        $servico_selecionado = $request->servico;
        return view('player_video', compact('servicos', 'servico_selecionado'));
    }
}
