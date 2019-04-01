<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePresupuesto extends Model
{
    protected $table = 'detalle_presupuestos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['presupuesto_id', 'codigo', 'cantidad', 'precio_sugerido', 'precio_venta'];
}
