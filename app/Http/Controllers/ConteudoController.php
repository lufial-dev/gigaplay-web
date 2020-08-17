<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConteudoRequest;
use File;

use App\Conteudo;
use App\Servico;
use Auth;

class ConteudoController extends Controller
{

    public function listar(){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;
        }else{
            $conteudos = Conteudo::all();
            $response['sucesso'] = true;
            $response['conteudos'] = $conteudos;
            
            foreach($conteudos as $conteudo){
                $conteudo->categoria;
                $conteudo->genero;
            }
            
                
            echo json_encode($response);
            return;
        }
    }

    public function listar_por_id(int $id){
        if(Auth::user()->tipo == "Cliente"){
            $response['sucesso'] =  false;
            $response['mensagem'] = "Você não tem permissão";
            echo json_encode($response);
            return;

        }else{

            $conteudo = Conteudo::find($id);
            $response['sucesso'] = true;
            $conteudo->categoria;
            $conteudo->categoria->servico;
            $conteudo->genero;

            $response['conteudo'] = $conteudo;           
                
            echo json_encode($response);
            return;
        }
    }


    public function store(ConteudoRequest $request){
        
        $extensoes_imagem = ["png", "jpg", "jpeg"];
        $extensoes_video = ["mp4", "wmv"];
        $extensoes_musica = ["mp3"];


        $tipo =  Servico::find($request->tipo, "nome");
        $categoria = $request->categoria;
        $titulo = $request->titulo;
        $descricao = $request->descricao;
        $conteudo_field = $request->conteudo;
        $genero = $request->genero;
        $imagem = $request->imagem;


        
        if(!$imagem->isValid() || !in_array($imagem->extension(), $extensoes_imagem)){
            $response["sucesso"] = false;
            $response["mensagem"] = "Erro ao carregar a imagem do conteúdo. <br> Tente novamente e verifique se a extenssão é jpg, png ou jpeg.";
            return;
        }
        
        if($tipo == "Vídeos" && (!$conteudo_field->isValid() || !in_array($conteudo_field->extension(), $extensoes_video))){
            $response["sucesso"] = false;
            $response["mensagem"] = "Erro ao carregar a Vídeo. <br> Tente novamente e verifique se a extenssão é mp4 ou wmv.";
            return;
        }

        if($tipo == "Músicas" && (!$conteudo_field->isValid() || !in_array($conteudo_field->extension(), $extensoes_musica))){
            $response["sucesso"] = false;
            $response["mensagem"] = "Erro ao carregar a Música. <br> Tente novamente e verifique se a extenssão é mp3.";
            return;
        }
        
        $response["sucesso"] = true;
        
        $conteudo = new Conteudo();

        $conteudo->categoria_id = $categoria;
        $conteudo->titulo = $titulo;
        $conteudo->descricao = $descricao;
        $conteudo->diretorio = $tipo == "Vídeos" ? $conteudo_field->store("conteudos/videos") : $conteudo_field->store("conteudos/musicas");
        $conteudo->classificacao = 0;
        $conteudo->genero_id = $genero;
        $conteudo->imagem = $imagem->store("conteudos/imagens");

        if(!$conteudo->save()){
            $response["sucesso"] = false;
            $repsonse["mensagem"] = "Erro ao cadastar conteúdo. <br> Verique os dados e tente novamente.";
            File::delete(storage_path($conteudo->imagem));
            File::delete(storage_path($conteudo->diretorio));
        }
        
        echo json_encode($response);
        
        
    }
}
