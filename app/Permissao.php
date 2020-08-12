<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grupo;
use Illuminate\Support\Facades\DB;

class Permissao extends Model
{
    protected $fillable = ['id', 'nome', 'ver', 'adicionar', 'editar', 'remover', 'entidade', 'status'];
    protected $hidden = [ 'created_at', 'update_at'];
    protected $table = 'permissoes';

    public static function buscar_por_grupo(int $id){
        return DB::table('permissoes')->get()->where('grupo_id', $id);
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class, 'grupos_permissoes');
    }
}
