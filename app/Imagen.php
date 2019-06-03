<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['repuesto_id', 'ruta'];
}
