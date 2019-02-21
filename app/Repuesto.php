<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repuesto extends Model
{
    protected $table = 'repuestos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['codigo', 'descripcion', 'marca_repuesto_id', 'marca_vehiculo_id', 'seccion_id', 'precio_id'];
}
