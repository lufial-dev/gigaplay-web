<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Permissao;

class Grupo extends Model
{
    protected $fillable = ['nome', 'status'];
    protected $hidden = ['id', 'created_at', 'update_at'];
    protected $table = 'grupos';

    public function permissoes(){
        return $this->belongsToMany(Permissao::class, 'grupos_permissoes');
    }
}
