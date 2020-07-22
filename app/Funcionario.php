<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['cpf', 'cargo', 'empresa_id', 'user_id', 'grupo_id'];
    protected $hidden = ['id', 'created_at', 'upgrade_at'];
    protected $table = 'funcionarios';
}
