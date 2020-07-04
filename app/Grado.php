<?php

namespace SisCol;

use Illuminate\Database\Eloquent\Model;
use DB;
class Grado extends Model
{
    protected $table='gradoestudio';
    protected $primaryKey='cod_grado';
    public $timestamps=true;
    protected $fillable=[
        							
       'cod_grado',
        'nombre_grado',
        'descripción_grado',
        'cod_nivel',
        'cod_colegio',
        'condicion',
       
    ];
    public static function Grados($id){
        return Grado::where('cod_nivel','=',$id,"AND","condicion","=",1)
        ->get();
    }
    public static function ValidarGrado($id){
        return Grado::where('cod_grado','=',$id,"AND","condicion","=",1)
        ->get();
    }
    public static function ValidarGradoDeEstudio($id){
        return DB::table('gradoestudio') -> where('condicion_colegio', '=','1') -> where('cod_colegio','=',$codcolegio2) ->get();
        //select max(cod_grado) from gradoestudio
    }

}
