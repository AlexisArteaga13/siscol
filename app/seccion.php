<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;

class seccion extends Model
{
    
    protected $table='seccion';
    protected $primaryKey='cod_sección';
    public $timestamps=true;
    protected $fillable=[
        									
        'cod_sección',
        'nombre_seccion',
        'cod_grado',
        'cod_nivel',
        'cod_colegio',
        
       
    ];
    public static function Seccion($id){
        return seccion::where('cod_grado','=',$id,"AND","condicion","=",1)
        ->get();
    }
    public static function ValidarSeccion($id){
        return seccion::where('cod_sección','=',$id,"AND","condicion","=",1)
        ->get();
    }

}
