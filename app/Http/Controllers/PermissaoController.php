<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Grupo;

class PermissaoController extends Controller
{
    public function listar_por_grupo(Request $request){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $grupo = Grupo::find($request->grupo_id);
            $permissoes =  $grupo->permissoes;

            $response['sucesso'] = true;
            $response['permissoes'] = $permissoes;
    
            foreach($permissoes as $permissao)
                $permissao->entidade;
                
            echo json_encode($response);
            return;
        }
    }
}
