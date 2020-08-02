<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genero;

class GeneroController extends Controller
{
    public function listar_por_servico(Request $request){
        $generos = Genero::buscar_por_servico($request->servico_id);
        $response["sucesso"] = true;
        $response["generos"] = $generos;
        echo json_encode($response);
        return;
    }
}
