<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoPermissao extends Model
{
    protected $fillable = ['grupo_id', 'permissao_id'];
    protected $hidden = ['id', 'created_at', 'update_at'];
    protected $table = 'grupos_permissoes';
}
