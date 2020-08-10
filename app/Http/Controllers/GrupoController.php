<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Grupo;

class GrupoController extends Controller
{
    public function listar(){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $grupos = Grupo::all();
            $response['sucesso'] = true;
            $response['grupos'] = $grupos;
                            
            echo json_encode($response);
            return;
        }
    }
}
