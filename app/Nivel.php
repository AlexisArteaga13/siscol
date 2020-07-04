<?php

namespace SisCol;
use DB;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
        protected $table='niveleducativo';
        protected  $primaryKey='cod_nivel';
        public $timestamps=true;
        protected $fillable=[
           
            'cod_nivel',
            'nombre_nivel',
            'cod_colegio',
            
            
        ];
        public static function Nivel($id){
            return Nivel::where('cod_colegio','=',$id,"AND","condicion","=",1)
            ->get();
        }
        public static function ValidarNivel($id){
            return Nivel::where('cod_nivel','=',$id,"AND","condicion","=",1)
            ->get();
        }
    
}
