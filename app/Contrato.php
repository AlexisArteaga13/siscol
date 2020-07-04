<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table='datoscontrato';
    protected $primaryKey='CodContrato';
    public $timestamps=true;
    protected $fillable=[
        'CodContrato',
        'cod_colegio',
        'DNIDocente',
        'DetallesContrato',
        						
    ];
}
