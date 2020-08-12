<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Permissao;

class PermissaoController extends Controller
{
    public function listar_por_grupo(Request $request){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $permissoes = Permissao::buscar_por_grupo($request->grupo_id);
            $response['sucesso'] = true;
            $response['permissoes'] = $permissoes;
            
            foreach($permissoes as $permissao)
                $permissao->entidade;
            
                
            echo json_encode($response);
            return;
        }
    }
}
