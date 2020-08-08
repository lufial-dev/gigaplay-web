<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Servico extends Model
{
    protected $fillable = ['nome', 'descricao'];
    protected $hidden = ['created_at', 'update_at'];
    protected $table = 'servicos';

    public static function buscar_por_id(int $id){
       return DB::table('servicos')->get()->where('id', $id);
    }
}

