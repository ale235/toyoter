<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarcaVehiculo extends Model
{
    protected $table = 'marca_vehiculos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['nombre'];
}
