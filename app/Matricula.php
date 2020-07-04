<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table='matrícula';
    protected $primaryKey='cod_matricula';
    public $timestamps=true;
    protected $fillable=[
        					
        'cod_matricula',
        'cod_AñoEscolar',
        'detalles_matricula',
        'cod_sección',
        'cod_grado',
        'cod_nivel',
        'cod_colegio',
        'CodAlumno',
        'condicion',
        
        						

    ];
    public static function ValidarMatricula($id){
        return Matricula::where('cod_matricula','=',$id)
        ->get();
    }
   
}
