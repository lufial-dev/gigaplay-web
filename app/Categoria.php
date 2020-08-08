<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    protected $fillable = ['nome', 'servico_id', 'status', 'servico'];
    protected $hidden = ['id', 'created_at', 'upgrade_at'];
    protected $table = 'categorias';

    public function servico(){
        return $this->belongsTo('App\Servico');
    }

    public static function buscar_por_servico(int $id){
        return DB::table('categorias')->get()->where('servico_id', $id);
    }

    public static function buscar_por_id(int $id){
        return DB::table('categorias')->get()->where('id', $id);
    }

}
