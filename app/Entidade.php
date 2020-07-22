<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable = ['nome', 'status'];
    protected $hidden = ['id', 'created_at', 'update_at'];
    protected $table = 'entidades';

}
