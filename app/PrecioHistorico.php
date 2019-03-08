<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrecioHistorico extends Model
{
    protected $table = 'precios_historicos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['precio_id', 'repuesto_id'];
}
