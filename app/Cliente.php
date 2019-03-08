<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['user_id', 'razon_social', 'telefono'];
}
