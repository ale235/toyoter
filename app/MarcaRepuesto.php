<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarcaRepuesto extends Model
{
    protected $table = 'marca_repuestos';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = ['nombre'];
}
