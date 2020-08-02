<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genero extends Model
{
    protected $fillable = ['nome'];
    protected $hidden = ['created_at', 'update_at'];
    protected $table = 'generos';

    public static function buscar_por_servico(int $id){
        return DB::table('generos')->get()->where('servico_id', $id);
    }
}
