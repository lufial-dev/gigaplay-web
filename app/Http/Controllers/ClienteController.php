<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Cliente;

class ClienteController extends Controller
{
    public function listar(){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $clientes = Cliente::all();
            $response['sucesso'] = true;
            $response['clientes'] = $clientes;
            
            foreach($clientes as $cliente)
                $cliente->usuario;
            
                
            echo json_encode($response);
            return;
        }
    }
}
