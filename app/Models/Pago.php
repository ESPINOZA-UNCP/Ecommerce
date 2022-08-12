<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes;
    
    protected $table='pago';

    protected $primaryKey='id_pago';

    public $timestamps=false;


    protected $fillable =[
    	'monto',
    	'tipo_pago',
        'cantidad',
    ];

    protected $guarded =[

    ];
    
    protected $dates = ['deleted_at'];
}
