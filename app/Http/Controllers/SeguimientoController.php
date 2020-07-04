<?php

namespace SisCol\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SeguimientoController extends Controller
{
    public function inicio(){
        return view('soyapoderado.inicio');
    }
  /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function buscar(Request $request){
        $codigomatricula = $request->input('cod_matricula');
        $codigoalumno= $request->input('cod_alumno');;
        $alumno=DB:: table('notas as not')
        ->join('matrícula as mat','mat.cod_matricula','=','not.cod_matricula')
        ->join('cursosdeprofesor as cp','not.id_detalle','=','cp.id_detalle')
        ->join('curso as c','c.CodCurso','=','cp.CodCurso')
        ->join('alumno as al','mat.CodAlumno','=','al.CodAlumno')
        -> select('al.CodAlumno','al.NombreAlumno','al.ApellidoAlumno','c.NombreCurso','mat.cod_AñoEscolar','mat.cod_sección','not.NotaPrimBim','not.NotaSegunBim','not.NotaTercerBim','not.NotaCuartoBim','not.NotaFinal')
        ->where('mat.cod_matricula','=',$codigomatricula)
        ->where('mat.CodAlumno','=',$codigoalumno)
        ->orderBy('al.ApellidoAlumno','asc')
        ->paginate(9999999999)
        ;
        return view('soyapoderado.vernotas',["alumno"=>$alumno]);
    }
}
