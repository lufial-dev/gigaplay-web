<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Servico;

class Cliente extends Model
{
    public function sevicos(){
        return $this->belongsToMany(Servico::class, 'clientes_servicos');
    }
}
