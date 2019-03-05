<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $table = 'precios';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['precio_sugerido', 'precio_minorista', 'precio_mayorista', 'precio_minorista_co', 'precio_mayorista_co', 'precio_personalizado'];
}
