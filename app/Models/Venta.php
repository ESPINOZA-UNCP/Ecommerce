<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    protected $table='venta';

    protected $primaryKey='id_venta';

    public $timestamps=false;

    protected $fillable =[
        'id_venta',
        'id_usuario',
        'id_pago',
        'id_paquete',
        'descripcion'
    ];

    protected $guarded =[

    ];
    
    protected $dates = ['deleted_at'];

}
