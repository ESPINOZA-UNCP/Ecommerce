<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itinerario extends Model
{
    use SoftDeletes;

    protected $table='itinerario';

    protected $primaryKey='id_itinerario';

    public $timestamps=false;

    protected $fillable =[
        'origen',
        'destino',
        'fecha_salida',
        'fecha_llegada'
    ];

    protected $guarded =[

    ];
    
    protected $dates = ['deleted_at'];

}
