<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Conteudo extends Model
{
    protected $fillable = ['titulo', 'descricao', 'diretorio', 'classificacao', 'imagem', 'categoria_id'];
    protected $hidden = ['id', 'created_at', 'update_at'];
    protected $table = 'conteudos';

    public static function buscar_por_categoria($id){
        return DB::table('conteudos')->get()->where('categoria_id', $id);
    }
}
