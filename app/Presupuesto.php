<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $primaryKey = 'id';

    public $timestamps = true;

//    protected $fillable = ['precio_id', 'repuesto_id'];
}
