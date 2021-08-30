<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'ventas';
    protected $hidden = ['created_at','updated_at'];

    protected $fillable = [
    
    'id_usuario',
    'venta_estado',
    'vent_celular',
    'vent_direccion',
    'vent_latitud',
    'vent_longitud',
    'vent_cant_productos',
    'vent_precio'

    ];
    
}
