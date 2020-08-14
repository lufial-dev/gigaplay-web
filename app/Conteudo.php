<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Conteudo extends Model
{
    protected $fillable = ['id','titulo', 'descricao', 'diretorio', 'classificacao', 'imagem', 'categoria_id', 'genero_id', 'created_at'];
    protected $hidden = [ 'update_at'];
    protected $table = 'conteudos';

    public static function buscar_por_categoria($id){
        return DB::table('conteudos')->get()->where('categoria_id', $id);
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id');
    }

    public function genero(){
        return $this->belongsTo('App\Genero', 'genero_id');
    }

}
