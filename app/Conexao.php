<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conexao extends Model
{
    protected $filleble = ['status'];
    protected $hidden = ['id', 'created_at', 'update_at'];
    protected $table = 'conexoes';
}
