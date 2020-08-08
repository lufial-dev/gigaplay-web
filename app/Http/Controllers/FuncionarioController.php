<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Funcionario;

class FuncionarioController extends Controller
{
    public function listar(){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $funcionarios = Funcionario::all();
            $response['sucesso'] = true;
            $response['funcionarios'] = $funcionarios;
            
            foreach($funcionarios as $funcionario){
                $funcionario->usuario;
                $funcionario->grupo;
            }
                
            echo json_encode($response);
            return;
        }
    }
}
