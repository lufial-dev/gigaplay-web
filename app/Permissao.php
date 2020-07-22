<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grupo;

class Permissao extends Model
{
    protected $fillable = ['nome', 'ver', 'adicionar', 'editar', 'remover', 'entidade', 'status'];
    protected $hidden = ['id', 'created_at', 'update_at'];
    protected $table = 'permissoes';

    public function grupos(){
        return $this->belongsToMany(Grupo::class, 'grupos_permissoes');
    }
}
