<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Funcionario;
use Auth;
use App\Grupo;
use App\Entidade;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password', 'cpf', 'status', 'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function funcionario(){
        return $this->hasOne("App\Funcionario");
    }

    public function permissao($entidade){
        if($this->tipo == "Funcionário"){
            $grupo_id = Funcionario::where("user_id", $this->id)->get()[0]->grupo_id;
            $permissoes = Grupo::find($grupo_id)->get()[0]->permissoes;

            if(count($permissoes) > 0 ){
                $entidade_id = Entidade::where("nome", $entidade)->get()[0]->id;

                foreach($permissoes as $permissao){
                    if($permissao->entidade_id == $entidade_id){
                        return $permissao;
                    }
                }
            }
            return false;
        }
        return false;
    }
}
