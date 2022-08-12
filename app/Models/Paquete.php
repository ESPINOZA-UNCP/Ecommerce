<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paquete extends Model
{
    use SoftDeletes;

    protected $table='paquete';

    protected $primaryKey='id_paquete';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
        'id_categoria'
    ];

    protected $guarded =[

    ];
    
    protected $dates = ['deleted_at'];

}
