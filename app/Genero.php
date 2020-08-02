<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = ['nome'];
    protected $hidden = ['created_at', 'update_at'];
    protected $table = 'generos';


}
