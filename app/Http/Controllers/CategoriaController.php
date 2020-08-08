<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

class CategoriaController extends Controller
{

    public function listar(){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $categorias = Categoria::all();
            $response['sucesso'] = true;
            $response['categorias'] = $categorias;
            echo json_encode($response);
            return;
        }
    }

    public function listar_por_servico(Request $request){
        $categorias = Categoria::buscar_por_servico($request->servico_id);
        $response["sucesso"] = true;
        $response["categorias"] = $categorias;
        echo json_encode($response);
        return;
    }
}
