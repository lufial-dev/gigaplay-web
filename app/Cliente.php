<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['quant_conexoes', 'quant_conexoes_ativas', 'user_id'];
    protected $hidden = ['id', 'created_at', 'upgrade_at'];
    protected $table = 'clientes';

    
    public function usuario(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function sevicos(){
        return $this->belongsToMany(Servico::class, 'clientes_servicos');
    }
}

