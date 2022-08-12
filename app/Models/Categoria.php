<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    
    protected $table='categoria';

    protected $primaryKey='id_categoria';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'descripcion',
        'precio',
        'id_itinerario',
        'id_lugar',
    ];

    protected $guarded =[

    ];
    
    protected $dates = ['deleted_at'];
}
