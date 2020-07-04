<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table='curso';
    protected $primaryKey='CodCurso';
    public $timestamps=true;
    protected $fillable=[
        					
        'CodCurso',
        'NombreCurso',
        'descripcionCurso',
        'cod_grado',
        'cod_nivel',
        'cod_colegio',
        'condicion',
        
        						

    ];
    public static function Curso($id){
        return Curso::where('cod_grado','=',$id,"AND","condicion","=",1)
        ->get();
    }
    public static function ValidarCurso($id){
        return Curso::where('CodCurso','=',$id,"AND","condicion","=",1)
        ->get();
    }
}
