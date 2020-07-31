<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servico;
use Auth;
class ServicoController extends Controller
{
    public function listar(){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $servicos = Servico::all();
            $response['sucesso'] = true;
            $response['servicos'] = $servicos;
            echo json_encode($response);
            return;
        }
    }
}
