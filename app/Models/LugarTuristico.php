<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LugarTuristico extends Model
{
    use SoftDeletes;

    protected $table='lugarturistico';

    protected $primaryKey='id_lugar';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'descripcion',
        'deleted_at'
    ];

    protected $guarded =[

    ];

    protected $dates = ['deleted_at'];

}
