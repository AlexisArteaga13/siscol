<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table='alumno';
    protected $primaryKey='CodAlumno';
    public $timestamps=true;
    protected $fillable=[
        					
        'CodAlumno',
        'NombreAlumno',
        'ApellidoAlumno',
        'TelefonoHogarAlumno',
        'CorreoAlumno',
        'DireccionAlumno',
        
        						

    ];
    public static function ValidarAlumno($id){
        return Alumno::where('CodAlumno','=',$id,"AND","condicion","=",1)
        ->get();
    }
}
