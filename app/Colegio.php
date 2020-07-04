<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    protected $table='colegio';
    protected $primaryKey='cod_colegio';
    public $timestamps=true;
    protected $fillable=[
        'cod_colegio',
        'Nombre_colegio',
        'Dirección',

    ];
}
