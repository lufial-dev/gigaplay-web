<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConteudoRequest;
use App\Conteudo;
use App\Servico;

class ConteudoController extends Controller
{
    public function store(ConteudoRequest $request){
        
        $extensoes_imagem = ["png", "jpg", "jpeg"];
        $extensoes_video = ["mp4", "wmv"];
        $extensoes_musica = ["mp3"];


        $tipo =  Servico::find($request->tipo, "nome");
        $categoria = $request->categoria;
        $titulo = $request->titulo;
        $descricao = $request->descricao;
        $conteudo_field = $request->conteudo;
        $imagem = $request->imagem;


        
        if(!$imagem->isValid() || !in_array($imagem->extension(), $extensoes_imagem)){
            $response["sucesso"] = false;
            $response["mensagem"] = "Erro ao carregar a imagem do conteúdo. <br> Tente novamente e verifique se a extenssão é jpg, png ou jpeg.";
            return;
        }
        
        if($tipo->nome == "Vídeos" && (!$conteudo_field->isValid() || !in_array($conteudo_field->extension(), $extensoes_video))){
            $response["sucesso"] = false;
            $response["mensagem"] = "Erro ao carregar a Vídeo. <br> Tente novamente e verifique se a extenssão é mp4 ou wmv.";
            return;
        }

        if($tipo->nome == "Músicas" && (!$conteudo_field->isValid() || !in_array($conteudo_field->extension(), $extensoes_musica))){
            $response["sucesso"] = false;
            $response["mensagem"] = "Erro ao carregar a Música. <br> Tente novamente e verifique se a extenssão é mp3.";
            return;
        }
        
        $response["sucesso"] = true;

        $conteudo = new Conteudo();

        $conteudo->categoria_id = $categoria;
        $conteudo->titulo = $titulo;
        $conteudo->descricao = $descricao;
        $conteudo->diretorio = $tipo->nome == "Vídeos" ? $conteudo_field->store("conteudos/videos") : $conteudo_field->store("conteudos/musicas");
        $conteudo->classificacao = 0;
        $conteudo->imagem = $imagem->store("conteudos/imagens");

        $conteudo->save();
    
        $response["tipo"] = $tipo;
        
        echo json_encode($response);
        
        
    }
}
