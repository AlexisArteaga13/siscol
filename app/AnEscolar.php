<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class AnEscolar extends Model
{
    protected $table='añoescolar';
    protected $primaryKey='cod_AñoEscolar';
    public $timestamps=true;
    protected $fillable=[
        'cod_AñoEscolar',
        'nombre_añoescolar',
        'descripción_añoescolar',

    ];
}
