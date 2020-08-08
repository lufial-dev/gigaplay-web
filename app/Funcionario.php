<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['cpf', 'cargo', 'empresa_id', 'user_id', 'grupo_id'];
    protected $hidden = ['id', 'created_at', 'upgrade_at'];
    protected $table = 'funcionarios';

    public function usuario(){
        return $this->belongsTo("App\User", "user_id");
    }

    public function grupo(){
        return $this->belongsTo("App\Grupo", "grupo_id");
    }
}
