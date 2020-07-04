<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class DetalleCurso extends Model
{
    protected $table='cursosdeprofesor';
    protected $primaryKey='id_detalle';
    public $timestamps=true;
    protected $fillable=[
        'id_detalle',					
        'CodCurso',
        'cod_grado',
        'cod_nivel',
        'cod_colegio',
        'condicion',
        
        						

    ];
}
